<!-- resources/views/emails/reset_password.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Gaya dasar untuk body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Kontainer utama untuk email */
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        /* Judul email */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Gaya untuk paragraf */
        p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Tombol reset password */
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol */
        .button:hover {
            background-color: #0056b3;
        }

        /* Footer */
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reset Password</h1>
        <p>Anda menerima email ini karena kami menerima permintaan reset kata sandi untuk akun Anda.</p>
        <p>Silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:</p>
        <a href="{{ $url }}" class="button">Reset Password</a>
        <p>Jika Anda tidak meminta reset kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.</p>
        <p>Terima kasih telah menggunakan aplikasi kami!</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Nama Aplikasi Anda. Semua hak dilindungi.</p>
        </div>
    </div>
</body>

</html>