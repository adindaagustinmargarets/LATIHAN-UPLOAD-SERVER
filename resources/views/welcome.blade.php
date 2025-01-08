@extends('layouts.frontend.app')

@section('content')
@php
$title = 'Mitra Jasa - Solusi tepat gudangnya freelance';
@endphp
<div class="container py-5">
    <!-- Hero Section -->
    <section class="hero bg-primary text-white text-center py-5 rounded">
        <h1 class="display-4 fw-bold">Jasa Transaksi Produk Digital</h1>
        <p class="lead">Solusi mudah, cepat, dan terpercaya untuk kebutuhan transaksi produk digital Anda.</p>
        <a href="#services" class="btn btn-light btn-lg mt-3">Lihat Freelance</a>
    </section>

    <!-- Features Section -->
    <section id="features" class="mt-5">
        <div class="text-center">
            <h2 class="fw-bold">Kenapa Memilih Kami?</h2>
            <p class="text-muted">Keunggulan layanan yang membuat kami menjadi pilihan utama Anda.</p>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 text-center">
                <i class="bi bi-shield-check display-4 text-primary"></i>
                <h4 class="mt-3">Keamanan Terjamin</h4>
                <p class="text-muted">Data Anda aman bersama kami dengan sistem keamanan terkini.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-speedometer2 display-4 text-primary"></i>
                <h4 class="mt-3">Proses Cepat</h4>
                <p class="text-muted">Transaksi selesai hanya dalam hitungan detik.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-headset display-4 text-primary"></i>
                <h4 class="mt-3">Layanan Pelanggan</h4>
                <p class="text-muted">Tim support siap membantu Anda 24/7.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="mt-5">
        <div class="text-center">
            <h2 class="fw-bold">Apa Kata Pelanggan Kami?</h2>
            <p class="text-muted">Testimoni nyata dari pelanggan yang telah menggunakan layanan kami.</p>
        </div>

        <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>

            <!-- Carousel Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Budi Santoso">
                                    <div>
                                        <h6 class="fw-bold mb-0">Budi Santoso</h6>
                                        <small class="text-muted">Jakarta</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Layanan sangat cepat dan harga bersaing! Saya sangat puas.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Ayu Lestari">
                                    <div>
                                        <h6 class="fw-bold mb-0">Ayu Lestari</h6>
                                        <small class="text-muted">Bandung</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Tim support sangat membantu ketika saya mengalami masalah.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Dewi Sari">
                                    <div>
                                        <h6 class="fw-bold mb-0">Dewi Sari</h6>
                                        <small class="text-muted">Surabaya</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Proses transaksi mudah dan sangat cepat! Sangat direkomendasikan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row">
                        <!-- Card 4 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Rizky Pratama">
                                    <div>
                                        <h6 class="fw-bold mb-0">Rizky Pratama</h6>
                                        <small class="text-muted">Yogyakarta</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Saya merasa aman bertransaksi melalui layanan ini. Sangat terpercaya!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Andi Setiawan">
                                    <div>
                                        <h6 class="fw-bold mb-0">Andi Setiawan</h6>
                                        <small class="text-muted">Medan</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Proses sangat cepat, dan hasilnya selalu memuaskan. Terima kasih!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 p-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Siti Hasanah">
                                    <div>
                                        <h6 class="fw-bold mb-0">Siti Hasanah</h6>
                                        <small class="text-muted">Makassar</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fst-italic">Layanan customer service sangat ramah dan solutif. Recommended!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- Call to Action Section -->
    <section class="mt-5 text-center py-5 bg-primary text-white rounded">
        <h2 class="fw-bold">Siap Memulai?</h2>
        <p class="lead">Bergabunglah sekarang dan nikmati kemudahan bertransaksi produk digital.</p>
        <a href="/register" class="btn btn-light btn-lg">Daftar Sekarang</a>
    </section>
</div>
@endsection