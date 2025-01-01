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

        #pay-button {
            width: 100%;
        }
    }
</style>

<body>
    @include('home.navbar')
    @include('home.navigasi')

    <!-- Section Checkout -->
    <section id="works" class="works">
        <div class="center-top-container">
            <img src="{{ asset('assets/images/Gova.png') }}" alt="Foto" class="img-fluid">
        </div>
        <div class="container mt-5">
            <div class="section-header">
                <h3 class="text-center">Checkout</h3>
            </div>
            <div class="works-content">

                <div class="row">


                    <form id="checkout-form" method="POST" action="{{ route('finalize_booking') }}">
                        @csrf
                        <div class="single-checkout-item">
                            <h4 class="product-name">{{ $field->name }}</h4>
                            <p class="product-price">Harga: {{ $field->price }}</p>
                            <p class="product-type">Jenis: {{ $field->type }}</p>
                            <p class="product-address">Alamat: {{ $field->address }}</p>
                        </div>

                        <div class="single-checkout-item">
                            <h4>Data Pemesanan</h4>
                            <p><strong> Nama:</strong> {{ $data['name'] }}</p>
                            <p><strong>Email:</strong> {{ $data['email'] }}</p>
                            <p><strong>Telepon:</strong> {{ $data['phone'] }}</p>
                            <p><strong>Tanggal:</strong> {{ $data['date'] }}</p>
                            <p><strong>Jam Mulai:</strong> {{ $data['start'] }}</p>
                            <p><strong>Jam Selesai:</strong> {{ $data['end'] }}</p>
                        </div>

                        <div class="checkout-action text-center mt-4">


                            <input type="hidden" name="field_id" value="{{ $field->id }}">
                            <input type="hidden" name="name" value="{{ $data['name'] }}">
                            <input type="hidden" name="email" value="{{ $data['email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                            <input type="hidden" name="date" value="{{ $data['date'] }}">
                            <input type="hidden" name="start" value="{{ $data['start'] }}">
                            <input type="hidden" name="end" value="{{ $data['end'] }}">

                            <!-- Tombol untuk memulai pembayaran -->
                            <button type="button" id="pay-button" class="btn btn-primary">Bayar
                                Sekarang</button>

                    </form>

                    @section('scripts')
                        <!-- Include Midtrans Snap.js -->
                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
                        </script>

                        <script type="text/javascript">
                            document.getElementById('pay-button').onclick = function() {
                                // SnapToken acquired from previous step
                                var snapToken = '{{ $snapToken }}';
                                snap.pay(snapToken, {
                                    // Opsi: Callback jika pembayaran berhasil
                                    onSuccess: function(result) {
                                        window.location.href =
                                            '{{ route('checkout-success', ['field_id' => $field->id, 'id' => $booking->id]) }}';

                                    },
                                    // Optional
                                    onPending: function(result) {
                                        /* You may add your own js here, this is just example */
                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                    },
                                    // Optional
                                    onError: function(result) {
                                        /* You may add your own js here, this is just example */
                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                    }
                                });
                            };
                        </script>

                    </div>
                </div>
            </div>
            <!--/.container-->
        </section>




        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>




    </body>

    </html>
