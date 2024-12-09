<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
</head>

<body>
    <h1>Pembayaran Berhasil</h1>
    <p>Nomor Order: {{ $orderNumber }}</p>

    <a href="{{ route('ticket.detail', ['order' => $orderNumber]) }}">Back To Home</a>

</html>