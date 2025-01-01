<!DOCTYPE html>
<html>

<head>
    <title>Boarding Pass</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .boarding-pass {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .left-section,
        .right-section {
            width: 48%;
        }

        .right-section {
            text-align: right;
        }

        .details p {
            margin: 5px 0;
            font-size: 16px;
        }

        .details strong {
            color: #333;
        }

        .divider {
            border-top: 2px dashed #ddd;
            margin: 15px 0;
        }

        .footer {
            background-color: #f9f9f9;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="boarding-pass">
        <!-- Header -->
        <div class="header">
            <div class="center-top-container">
                <img src="{{ public_path('assets/images/Gova.png') }}" alt="Foto" class="img-fluid">
            </div>
            <h2> Tiket Booking</h2>
            <p><strong>Terima kasih atas pemesanan Anda!</strong></p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="section">
                <div class="details">
                    <p><strong>Kode Booking:</strong> {{ $orderId }}</p>
                    <p><strong>Status:</strong> {{ $booking->status }}</p>
                    <p><strong>Nama Pemesan:</strong> {{ $booking->name }}</p>
                    <p><strong>Email:</strong> {{ $booking->email }}</p>
                </div>
                <div class="divider"></div>
                <div class="details">
                    <p><strong>Lapangan:</strong> {{ $field->name }}</p>
                    <p><strong>Alamat:</strong> {{ $field->address }}</p>
                    <p><strong>Jenis:</strong> {{ $field->type }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($field->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="section">
                <div class="details">
                    <p><strong>Tanggal:</strong> {{ $booking->date }}</p>
                    <p><strong>Jam:</strong> {{ $booking->start }} - {{ $booking->end }}</p>
                </div>

                <!-- Menampilkan Barcode -->
                <div class="barcode">
                    <p><strong>Barcode:</strong></p>
                    <img src="{{ $barcode }}" alt="Barcode" />
                    <!-- Menampilkan angka di bawah barcode -->
                    <p><strong>{{ $orderId }}</strong></p>
                </div>


            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Harap tunjukkan Tiket ini saat masuk.</p>
            <p>&copy; 2025 Go Reservation. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
