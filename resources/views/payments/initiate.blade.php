<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
</head>

<body>
    <h1>Pembayaran</h1>
    <button id="pay-button">Bayar Sekarang</button>
    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.pay('{{ $snapToken }}');
        });
    </script>
</body>

</html>