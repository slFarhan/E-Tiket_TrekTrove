<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .ticket-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border: 2px dashed #ccc;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header img {
            max-width: 100px;
        }

        .ticket-header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        .ticket-info {
            margin: 20px 0;
            border-collapse: collapse;
            width: 100%;
        }

        .ticket-info th,
        .ticket-info td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .ticket-info th {
            color: #555;
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .ticket-info td {
            color: #333;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .barcode img {
            max-width: 200px;
        }

        .ticket-footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <img src="{{ asset('images/profile.jpg') }}" alt="Logo">
            <h1>Detail Tiket Pemesanan</h1>
        </div>

        <table class="ticket-info">
            <tr>
                <th>Nama Pemesan</th>
                <td>{{ $ticket->nama }}</td>
            </tr>
            <tr>
                <th>Destinasi</th>
                <td>{{ $ticket->destinasi->nama }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $ticket->tanggal }}</td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td>{{ $ticket->jumlah }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($ticket->status) }}</td>
            </tr>
        </table>

        <div class="barcode">
    <p>Scan Barcode:</p>
    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG((string) $ticket->id, 'C128') }}" alt="Barcode">

</div>

        <div class="ticket-footer">
            <p>Terima kasih telah memesan tiket melalui Trektrove!</p>
        </div>
    </div>
</body>
</html>
