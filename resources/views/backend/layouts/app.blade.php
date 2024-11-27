<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : 'LARAVEL' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMF2b1Z5Z4F+3U1T5jF5N0z5h6h5F4Qf8D4Zf4" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }

        .sidebar {
            height: 100vh;
            padding-top: 20px;
            background-color: #007bff;
        }

        .sidebar .nav-link {
            color: #ffffff;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .card {
            margin-top: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 0.9rem;
        }

        .badge-custom {
            background-color: #28a745;
            color: white;
        }

        .header-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .header-description {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .content-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="position-sticky">
                <h4 class="text-center text-white">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('example-data.index') }}">
                            <i class="fas fa-database"></i> Example Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-white" style="text-decoration: none;">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
            <header class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div>
                    <h1 class="header-title">Dashboard</h1>
                    <p class="header-description">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            </header>

            <div>
                @yield('content')
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Sweetalert -->
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
    @elseif(session ('error'))
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
</body>

</html>