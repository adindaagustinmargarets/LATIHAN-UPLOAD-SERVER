<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .header,
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            padding: 20px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .list-group {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .list-group-item strong {
            font-weight: bold;
        }

        .badge {
            font-size: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>Invoice Pembayaran</h3>
        <p>{{ \Carbon\Carbon::parse($payment->created_at)->format('d M Y, H:i') }}</p>
    </div>
    <div class="container">
        <div>
            <h4 class="section-title">Informasi Transaksi</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>No. Referensi:</strong>
                    <span>{{ $payment->merchant_ref }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Status:</strong>
                    <span class="badge badge-{{ $payment->status === 'BERHASIL' ? 'success' : ($payment->status === 'PENDING' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>Transfer:</strong>
                    <span>{{ $tripayData['payment_name'] }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Rekening:</strong>
                    <span>{{ $tripayData['pay_code'] }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Biaya Admin:</strong>
                    <span>Rp {{ number_format($tripayData['fee_customer'], 0, ',', '.') }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Jumlah:</strong>
                    <span>Rp {{ number_format($tripayData['amount'], 0, ',', '.') }}</span>
                </li>
            </ul>
        </div>
        <div>
            <h4 class="section-title">Informasi Pelanggan</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Nama:</strong>
                    <span>{{ $payment->customer_name }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Phone:</strong>
                    <span>{{ $payment->customer_phone }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Email:</strong>
                    <span>{{ $payment->customer_email }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Your Company Name - All Rights Reserved</p>
    </div>
</body>

</html>