<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lapangan;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == "user") {
                // Menggunakan paginate untuk membatasi 3 item per halaman
                $field = Lapangan::paginate(3);
                $gallery = Gallery::all();

                return view('home.index', compact('field', 'gallery'));
            } else if ($usertype == "admin") {
                return view('admin.index');
            } else {
                return view('home.index');
            }
        }
    }

    public function home(Request $request)
    {
        $search = $request->input('search');
        $field = Lapangan::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        })->paginate(3);
        $search = $request->input('search');



        // Filter data berdasarkan pencarian
        $field = Lapangan::when($search, function ($query, $search) {
            return $query->where('type', 'like', '%' . $search . '%');
        })
            ->paginate(3);

        // Periksa apakah data ditemukan
        // Debug untuk melihat hasil query yang dihasilkan

        $gallery = Gallery::all();




        return view('home.index', compact('field', 'gallery'));
    }
    public function create_field()
    {
        return view('admin.create_field');
    }
    public function add_field(Request $request)
    {
        $data = new Lapangan();
        $data->name = $request->name;
        $image = $request->image;
        $data->address = $request->address;
        $data->price = $request->price;
        $data->type = $request->type;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('fotolapang', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }
    public function view_field()
    {
        $data = Lapangan::all();

        return view('admin.view_field', compact('data'));
    }
    public function delete_field($id)
    {
        $data = Lapangan::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_field($id)
    {
        $data = Lapangan::find($id);
        return view('admin.update_field', compact('data'));
    }
    public function edit_field(Request $request, $id)
    {
        $data = Lapangan::find($id);
        $data->name = $request->name;
        $image = $request->image;
        $data->address = $request->address;
        $data->price = $request->price;
        $data->type = $request->type;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('fotolapang', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }
    public function bookings()
    {
        $data = Booking::all();

        return view('admin.booking', compact('data'));
    }
    public function basket_field()
    {
        $field = Lapangan::all();

        return view('home.basket_field', compact('field'));
    }
    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();

        return redirect()->back();
    }
    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'reject';
        $booking->save();

        return redirect()->back();
    }

    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery', compact('gallery'));
    }

    public function upload_gallery(Request $request)
    {

        $data = new Gallery();
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallary', $imagename);
            $data->image = $imagename;
            $data->save();
            return redirect()->back();
        }
    }
    public function delete_gallery($id)
    {
        $data = Gallery::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function message()
    {
        $data = Contact::all();

        return view('admin.message', compact('data'));
    }
}
