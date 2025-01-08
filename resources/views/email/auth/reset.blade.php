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
    <p>Permintaan reset password ini dilakukan dari:</p>
    <ul>
        <p>IP Address: <strong>{{ $ip ?? 'Tidak diketahui' }}</strong></p>
        <p>Perkiraan Lokasi: <strong>{{ $locationData['city'] ?? 'Tidak diketahui' }}</strong></p>
        <p>Koordinat: <strong>{{ $locationData['latitude'] ?? 'Tidak diketahui' }}, {{ $locationData['longitude'] ?? 'Tidak diketahui' }}</strong></p>
    </ul>
</body>

</html>