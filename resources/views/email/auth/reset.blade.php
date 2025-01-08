<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h2>Halo, {{ $user->name }}</h2>
    <p>Kami menerima permintaan untuk mereset password Anda.</p>
    <p>Klik tautan di bawah ini untuk mereset password Anda:</p>
    <a href="{{ $resetUrl }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: #007BFF; text-decoration: none; border-radius: 5px;">
        Reset Password
    </a>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
</body>

</html>