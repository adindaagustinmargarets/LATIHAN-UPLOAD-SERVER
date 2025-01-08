<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        /* Mengatur gaya umum untuk email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        .email-body {
            font-size: 16px;
            color: #555555;
            margin-bottom: 20px;
        }

        .verification-btn {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .verification-btn:hover {
            background-color: #0056b3;
        }

        .email-footer {
            font-size: 12px;
            color: #888888;
            margin-top: 30px;
        }

        .footer-link {
            color: #007BFF;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            Halo, {{ $user->name }}!
        </div>

        <div class="email-body">
            <p>Lakukan verifikasi! Untuk mengaktifkan akun Anda, harap verifikasi email Anda dengan mengklik tombol di bawah ini:</p>
            <a href="{{ $verifikasiemail }}" class="verification-btn" style="color: white;">Verifikasi Email Anda</a>
        </div>

        <div class="email-footer">
            <p>Jika Anda tidak mendaftar di platform kami, Anda dapat mengabaikan email ini.</p>
            <p>Untuk pertanyaan lebih lanjut, kunjungi <a href="#" class="footer-link">halaman bantuan</a>.</p>
        </div>
    </div>
</body>

</html>