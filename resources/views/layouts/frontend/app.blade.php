<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : 'LARAVEL' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('layouts.frontend.partials.navbar')

    <div class="container mt-4">
        @yield('content')
        @unless(request()->is('login', 'register'))
        <a href="https://wa.me/6285741710084" class="sticky-whatsapp">
            <img src="{{ asset('gambar/whatsapp.png') }}" alt="WhatsApp">
        </a>
        @endunless
    </div>

    @include('layouts.frontend.partials.footer')
</body>
<style>
    .navbar .nav-link {
        font-size: 1rem;
        color: #ffffff !important;
    }

    .navbar .nav-link.active {
        font-weight: bold;
        text-decoration: underline;
    }

    .navbar .btn {
        font-size: 0.9rem;
    }

    .sticky-whatsapp {
        position: fixed;
        /* Menjadikan elemen tetap terlihat saat menggulir */
        bottom: 90px;
        /* Jarak dari bawah layar */
        right: 20px;
        /* Jarak dari sisi kanan layar */
        z-index: 9999;
        /* Menjamin elemen tetap di atas konten lain */
    }

    .sticky-whatsapp img {
        width: 60px;
        /* Menyesuaikan ukuran gambar */
        height: 60px;
        /* Menyesuaikan ukuran gambar */
        border-radius: 50%;
        /* Membuat gambar berbentuk bulat */
        display: block;
        /* Menghilangkan ruang kosong di sekitar gambar */
        background: none;
        /* Menghilangkan latar belakang jika ada */
    }
</style>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- Sweatalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1800
    });
</script>
@elseif(session('error'))
<script>
    Swal.fire({
        position: "center",
        icon: "error",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 1800
    });
</script>
@endif
@stack('scripts')

</html>