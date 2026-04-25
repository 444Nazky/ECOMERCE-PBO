@extends('layouts.app')

@section('content')
<style>
    /* Styling khusus UI Modern Crescendo di index.php */
    .hero-bg {
        background: linear-gradient(135deg, var(--hover-blue, #3A5CE5), var(--primary-blue, #4A6CF7));
        border-radius: 28px !important;
        /* Rounded corners besar */
    }

    .product-card-bg {
        background-color: #FFFFFF;
        /* Putih bersih untuk produk */
        border-radius: 24px;
        transition: all 0.3s ease;
    }

    .product-card-bg:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(74, 108, 247, 0.08);
        /* Bayangan biru halus */
    }

    .category-card {
        background-color: #FFFFFF;
        border-radius: 24px;
        overflow: hidden;
        min-height: 200px;
        position: relative;
        transition: 0.3s;
    }

    .category-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.04);
    }

    .category-img {
        position: absolute;
        bottom: 0;
        right: 0;
        max-width: 150px;
        border-radius: 24px 0 0 0;
    }

    .service-wrapper {
        background-color: #E2E7FB;
        /* Soft grey/lavender box */
        border-radius: 28px;
        padding: 4rem 2rem;
    }

    .service-icon-box {
        width: 60px;
        height: 60px;
        background-color: transparent;
        /* Di referensi icon tidak punya box background bulat terpisah, langsung di atas kontainer abu-abu */
        color: var(--text-dark, #1e293b);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 0.5rem;
        transition: 0.3s;
    }

    .service-icon-box:hover {
        transform: scale(1.1);
        color: var(--primary-blue);
    }

    .text-primary-custom {
        color: var(--primary-blue, #4A6CF7) !important;
    }

    .btn-primary-custom {
        background-color: var(--primary-blue, #4A6CF7);
        border-color: var(--primary-blue, #4A6CF7);
        color: white;
        border-radius: 24px !important;
    }

    .btn-primary-custom:hover {
        background-color: var(--hover-blue, #3A5CE5);
        border-color: var(--hover-blue, #3A5CE5);
        color: white;
    }

    .btn-outline-custom {
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        border-radius: 24px !important;
    }
</style>

<div class="container py-4">
    <!-- 1. Hero Section (Paling Atas) -->
    <div class="hero-bg rounded-4 text-white shadow-sm mb-5 position-relative overflow-hidden">
        <div class="container-fluid py-5 px-4 px-md-5">
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative z-1 py-3">
                    <h1 class="display-4 fw-bold mb-3" style="letter-spacing: -1px;">Elevate Your<br>Audio Journey</h1>
                    <p class="fs-5 mb-4 text-white-50">Experience crystal clear sound quality and premium design
                        tailored for your lifestyle.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <button class="btn btn-light btn-lg px-4 py-2 fw-bold text-dark shadow-sm"
                            style="color: var(--primary-blue) !important; border-radius: 24px;" type="button">Shop
                            Now</button>
                        <button class="btn btn-outline-custom btn-lg px-4 py-2 fw-bold text-white" type="button">Learn
                            More</button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-flex justify-content-center position-relative">
                    <!-- Placeholder Gambar Model -->
                    <img src="https://via.placeholder.com/500x350/ffffff/2563eb?text=Model+Image+Placeholder"
                        class="img-fluid rounded-4 shadow-lg object-fit-cover" alt="Hero Model"
                        style="transform: scale(1.05);">
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Featured Products Section (Data Dinamis PHP) -->
    <div class="mb-5 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0" style="color: var(--text-dark, #1e293b);">Featured Products</h3>
            <a href="#" class="text-primary-custom text-decoration-none fw-semibold">View All ></a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @while ($row = $dataProduk->fetch_assoc())
                <div class="col">
                    <div class="card h-100 border-0 product-card-bg">
                        <!-- Placeholder Gambar Produk -->
                        <div class="p-3">
                            <img src="{{ asset('assets/img/' . urlencode($row['nama_produk'])) }}" class="card-img-top rounded-3"
                                alt="{{ $row['nama_produk'] }}">
                        </div>
                        <div class="card-body pt-1 pb-4 px-4 d-flex flex-column">
                            <!-- Kategori -->
                            <p class="text-muted fw-medium mb-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">

                                {{ strtoupper($row['nama_kategori']) }}
                            </p>
                            <!-- Judul Produk Bold -->

                            <h6 class="card-title fw-bold mb-3 fs-5" style="color: var(--text-dark, #1e293b);">
                                {{ $row['nama_produk'] }}
                            </h6>
                            <!-- Harga di Bawah -->
                            <div class="mt-auto">
                                <span
                                    class="fw-bold fs-5 text-primary-custom">{{ $pbo->formatHarga($row['harga']) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endwhile
        </div>
    </div>

    <!-- 3. Shop By Category (Statis) -->
    <div class="mb-5 mt-5 pt-4">
        <h3 class="fw-bold mb-4" style="color: var(--text-dark, #1e293b);">Shop By Category</h3>
        <div class="row g-4">
            <!-- Kategori 1 -->
            <div class="col-md-4">
                <div class="category-card p-4 h-100 shadow-sm border-0">
                    <h4 class="fw-bold mb-1" style="color: #1e293b;">Speaker</h4>
                    <a href="#" class="text-secondary text-decoration-none small fw-medium">View Accessories ></a>
                    <img src="{{ asset('assets/img/Airpods.png') }}" alt="Speaker" class="category-img shadow"
                        style="border-radius: 16px 0 0 0;">
                </div>
            </div>
            <!-- Kategori 2 -->
            <div class="col-md-4">
                <div class="category-card p-4 h-100 shadow-sm border-0">
                    <h4 class="fw-bold mb-1" style="color: #1e293b;">Accessories</h4>
                    <a href="#" class="text-secondary text-decoration-none small fw-medium">View Accessories ></a>
                    <img src="{{ asset('assets/img/Airpods.png') }}" alt="Accessories" class="category-img shadow"
                        style="border-radius: 16px 0 0 0;">
                </div>
            </div>
            <!-- Kategori 3 -->
            <div class="col-md-4">
                <div class="category-card p-4 h-100 shadow-sm border-0">
                    <h4 class="fw-bold mb-1" style="color: #1e293b;">Wireless Charger</h4>
                    <a href="#" class="text-secondary text-decoration-none small fw-medium">View Accessories ></a>
                    <img src="{{ asset('assets/img/Airpods.png') }}" alt="Charger" class="category-img shadow"
                        style="border-radius: 16px 0 0 0;">
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Fitur Layanan (Statis) -->
    <div class="mt-5 pt-4 pb-4">
        <div class="service-wrapper text-center shadow-sm">
            <h3 class="fw-bold mb-5" style="color: var(--text-dark);">Experience Streamlined<br>Shopping With Crescendo
            </h3>
            <div class="row g-4 mb-5 justify-content-center">
                <!-- Icon 1 -->
                <div class="col-md-4 px-4">
                    <div class="service-icon-box mb-2">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1e293b;">Free Delivery</h5>
                    <p class="text-secondary small mt-2">Dapatkan layanan pengiriman gratis untuk setiap pembelian tanpa
                        minimum order.</p>
                </div>
                <!-- Icon 2 -->
                <div class="col-md-4 px-4">
                    <div class="service-icon-box mb-2">
                        <i class="bi bi-shop-window"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1e293b;">Self Pickup</h5>
                    <p class="text-secondary small mt-2">Pesan secara online dan ambil langsung barang di gerai terdekat
                        tanpa antri.</p>
                </div>
                <!-- Icon 3 -->
                <div class="col-md-4 px-4">
                    <div class="service-icon-box mb-2">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1e293b;">Warranty</h5>
                    <p class="text-secondary small mt-2">Seluruh produk memiliki garansi resmi dan perlindungan terhadap
                        kerusakan teknis.</p>
                </div>
            </div>

            <button class="btn btn-primary-custom btn-lg px-5 py-3 fw-bold shadow">
                Shop Now
            </button>
        </div>
    </div>
</div>
@endsection
