<!doctype html>
<html class="no-js" lang="en">
<base href="/public">
@include('home.css')
<style>
    /* Style untuk kontainer Checkout */
    #works {
        background-color: #f9f9f9;
        padding: 60px 0;
    }

    .section-header h3 {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    /* Style untuk checkout form */
    .single-checkout-item {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .single-checkout-item h4 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .single-checkout-item p {
        font-size: 16px;
        color: #666;
        margin: 5px 0;
    }

    .checkout-details p {
        font-size: 18px;
        color: #333;
        margin: 10px 0;
    }

    .checkout-details strong {
        font-weight: bold;
    }

    /* Style untuk tombol bayar */
    .checkout-action {
        margin-top: 30px;
    }

    #pay-button {
        background-color: #007bff;
        color: white;
        font-size: 18px;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    #pay-button:hover {
        background-color: #0056b3;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    #pay-button:focus {
        outline: none;
    }

    /* Responsif untuk layar kecil */
    @media screen and (max-width: 768px) {
        .checkout-content {
            padding: 0 20px;
        }

        .single-checkout-item,
        .checkout-details {
            font-size: 14px;
        }


    }

    /* Kontainer untuk menempatkan gambar di tengah atas */
    .center-top-container {
        display: flex;
        justify-content: center;
        /* Menempatkan gambar di tengah secara horizontal */
        align-items: flex-start;
        /* Memastikan gambar berada di bagian atas kontainer */

    }

    /* Gambar yang akan ditampilkan */
</style>

<body>
    @include('home.navbar')
    @include('home.navigasi')
    <section id="works" class="works">
        <div class="container mt-5">
            <div class="center-top-container">
                <img src="{{ asset('assets/images/Gova.png') }}" alt="Foto" class="img-fluid">
            </div>
            <div class="ticket-container">
                <div class="works-content">

                    <div class="row">
                        <div class="single-checkout-item">
                            <div class="ticket-header">
                                <h2>Tiket Berhasil Dipesan!</h2>
                                <p>Terima kasih atas pemesanan Anda.</p>
                            </div>

                            <div class="ticket-details">
                                <h2>Tiket Booking</h2>
                                <p><strong>Kode Booking:</strong> {{ $orderId }}</p>
                                <p><strong>Status:</strong> {{ $booking->status }}</p>
                                <hr>
                                <p><strong>Lapangan:</strong> {{ $field->name }}</p>
                                <p><strong>Alamat:</strong> {{ $field->address }}</p>
                                <p><strong>Jenis:</strong> {{ $field->type }}</p>
                                <p><strong>Harga:</strong> Rp{{ number_format($field->price, 0, ',', '.') }}</p>
                                <hr>
                                <p><strong>Nama Pemesan:</strong> {{ $booking->name }}</p>
                                <p><strong>Email:</strong> {{ $booking->email }}</p>
                                <p><strong>Telepon:</strong> {{ $booking->phone }}</p>
                                <p><strong>Tanggal:</strong> {{ $booking->date }}</p>
                                <p><strong>Jam:</strong> {{ $booking->start }} - {{ $booking->end }}</p>
                            </div>

                            <!-- Form untuk unduh tiket -->
                            <form
                                action="{{ route('checkout-success-unduh', ['field_id' => $field->id, 'id' => $booking->id]) }}"
                                method="POST">
                                @csrf <!-- Pastikan menggunakan CSRF token untuk keamanan -->
                                <button type="submit" class="btn btn-primary">Unduh Tiket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>



</html>
