<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Contact;
use App\Models\Booking;
use App\Models\Gallery;

use Midtrans\Config;
use Barryvdh\DomPDF\Facade\Pdf as PDF; // Mengimpor class mPDF

use Picqer\Barcode\BarcodeGeneratorPNG;

use Midtrans\Snap;
use Illuminate\Support\Facades\Session;



use Carbon\Carbon;

class HomeController extends Controller
{
    public function field_details($id)
    {
        $field = Lapangan::find($id);
        return view('home.detailfield', compact('field'));
    }

    public function checkout(Request $request, $field_id)
    {
        // Middleware auth untuk memastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ]);

        // Mendapatkan data lapangan berdasarkan ID
        $field = Lapangan::findOrFail($field_id);

        // Pengecekan ketersediaan lapangan
        $start = $request->start;
        $end = $request->end;
        $isBooked = Booking::where('field_id', $field_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($start, $end) {
                $query->where('start', '<', $end)
                    ->where('end', '>', $start);
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->withErrors(['error' => 'Lapangan sudah dipesan pada waktu tersebut, coba waktu lain.']);
        }

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = filter_var(config('midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = filter_var(config('midtrans.is_sanitized'), FILTER_VALIDATE_BOOLEAN);
        Config::$is3ds = filter_var(config('midtrans.is_3d_secure'), FILTER_VALIDATE_BOOLEAN);

        // Detail transaksi
        $transaction_details = [
            'order_id' => 'order-' . time(),
            'gross_amount' => $field->price, // Harga lapangan
        ];

        // Detail pelanggan
        $customer_details = [
            'first_name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ];

        // Parameter transaksi
        $transaction = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        try {
            // Mendapatkan Snap Token untuk pembayaran
            $snapToken = Snap::getSnapToken($transaction);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Midtrans error: ' . $e->getMessage()]);
        }

        // Simpan data booking sementara (dengan status pending)
        $booking = new Booking();
        $booking->field_id = $field_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->start = $start;
        $booking->end = $end;
        $booking->status = 'pending';
        $booking->order_id = $transaction_details['order_id'];
        $booking->save();

        // Kirim data ke view untuk checkout
        return view('home.checkout', [
            'field' => $field,
            'data' => $request->all(),
            'snapToken' => $snapToken,
            'booking' => $booking // pastikan ini mengirim variabel booking
        ]);
    }


    public function finalizeBooking(Request $request)
    {
        // Validasi input
        $request->validate([
            'snap_token' => 'required|string',
            'order_id' => 'required|string',
        ]);

        // Cari booking berdasarkan order_id
        $booking = Booking::where('order_id', $request->order_id)->firstOrFail();

        // Periksa status pembayaran dari Midtrans
        $booking->status = 'approve';
        $booking->save();
    }

    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back();
    }
    public function success($field_id, $booking_id)
    {
        // Cari data lapangan berdasarkan field_id
        $field = Lapangan::find($field_id);

        // Cari booking berdasarkan booking_id
        $booking = Booking::where('id', $booking_id)->first();

        // Pastikan booking ada
        if (!$booking) {
            return redirect()->route('booking-not-found')->with('error', 'Booking tidak ditemukan.');
        }

        // Update status booking
        $booking->status = 'approve';
        $booking->save();

        // Generate orderId dan kembalikan tampilan tiket
        $orderId = $booking->order_id ?? 'ORD-' . strtoupper(uniqid());
        return view('home.tiket', compact('field', 'orderId', 'booking'));
    }



    // Method untuk unduh tiket


    // Pastikan untuk menggunakan PDF yang sesuai

    public function unduhTiket($field_id, $booking_id)
    {
        // Cari data lapangan berdasarkan field_id
        $field = Lapangan::find($field_id);
        if (!$field) {
            return redirect()->route('home')->withErrors('Lapangan tidak ditemukan.');
        }

        // Cari booking berdasarkan booking_id
        $booking = Booking::find($booking_id);
        if (!$booking) {
            return redirect()->route('checkout-success', ['field_id' => $field_id])->withErrors('Booking tidak ditemukan.');
        }

        // Cek order_id atau buat satu jika belum ada
        $orderId = $booking->order_id ?? 'ORD-' . strtoupper(uniqid());

        // Membuat Barcode
        $generator = new BarcodeGeneratorPNG();
        $barcodeData = $generator->getBarcode($orderId, $generator::TYPE_CODE_128); // Jenis barcode bisa disesuaikan

        // Encode barcode ke dalam base64
        $barcodeDataUri = 'data:image/png;base64,' . base64_encode($barcodeData);

        // Generate PDF untuk tiket
        $pdf = PDF::loadView('home.unduhtiket', [
            'barcode' => $barcodeDataUri,  // Sertakan barcode dalam PDF
            'field' => $field,
            'booking' => $booking,
            'orderId' => $orderId,  // Sertakan order_id untuk digunakan di PDF
        ]);

        // Download tiket dalam bentuk PDF
        return $pdf->download('tiket_' . $orderId . '.pdf');
    }
}
