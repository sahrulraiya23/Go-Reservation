<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>

<body>
    <h1>Silakan lakukan pembayaran untuk booking lapangan Anda</h1>
    <button id="pay-button">Bayar Sekarang</button>

    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('payment.success') }}";
                },
                onPending: function(result) {
                    alert("Pembayaran masih pending.");
                },
                onError: function(result) {
                    alert("Terjadi kesalahan saat pembayaran.");
                }
            });
        };
    </script>
</body>

</html>
