@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold" style="color: var(--text-dark, #1e293b);">
                    {{ $product['nama_produk'] ?? $title ?? 'Produk' }}
                </h2>
                <p class="text-muted mb-0">
                    {{ strtoupper($product['nama_kategori'] ?? '') }}
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ url('/') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card border-0 product-card-bg shadow-sm">
                    <div class="p-3">
                        @php
                            $imageName = $product['nama_produk'] ?? '';
                        @endphp
                        @if(!empty($imageName))
                                <img
                                src="{{ file_exists(public_path('assets/img/' . ($product['id_produk'] ?? '') . '.jpg'))
                                    ? asset('assets/img/' . ($product['id_produk'] ?? '') . '.jpg')
                                    : asset('assets/img/default.png') }}"
                                class="card-img-top rounded-3"
                                alt="{{ $product['nama_produk'] ?? $title ?? 'Produk' }}"
                                style="width: 100%; height: auto; object-fit: cover;"
                            >
                        @else
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-image fs-1 d-block"></i>
                                Gambar tidak tersedia
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm product-card-bg h-100 p-4">
                    @if(empty($product))
                        <div class="text-muted">
                            Produk tidak ditemukan.
                        </div>
                    @else
                        <div class="mb-3">
                            <span class="fw-bold fs-4 text-primary" style="color: var(--primary-blue, #4A6CF7) !important;">
                                {{ isset($pbo) ? $pbo->formatHarga($product['harga']) : $product['harga'] }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-dark border" style="border-color: #E1E7FE;">
                                {{ $product['id_produk'] ?? '' }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold mb-2" style="color: var(--text-dark, #1e293b);">Deskripsi</h5>
                            <p class="text-secondary" style="white-space: pre-wrap;">
                                {{ $product['deskripsi'] ?? '' }}
                            </p>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-primary px-4 py-2 fw-bold" type="button">
                                <i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang
                            </button>
                            <button class="btn btn-outline-primary px-4 py-2 fw-bold" type="button">
                                <i class="bi bi-heart me-1"></i> Simpan
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
