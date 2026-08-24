@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h3 class="fw-bold mb-0" style="color: var(--text-dark, #1e293b);">All Products</h3>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @while ($row = $dataProduk->fetch_assoc())
                <div class="col">
                    <a href="{{ url('/produk/' . $row['id_produk']) }}" class="text-decoration-none">
                        <div class="card h-100 border-0 product-card-bg">
                            <div class="p-3">
                                <img src="{{ file_exists(public_path('assets/img/' . ($row['id_produk'] ?? '') . '.jpg'))
                                    ? asset('assets/img/' . ($row['id_produk'] ?? '') . '.jpg')
                                    : asset('assets/img/default.png') }}"
                                    class="card-img-top rounded-3" alt="{{ $row['nama_produk'] }}">
                            </div>

                            <div class="card-body pt-1 pb-4 px-4 d-flex flex-column">
                                <p class="text-muted fw-medium mb-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    {{ strtoupper($row['nama_kategori']) }}
                                </p>

                                <h6 class="card-title fw-bold mb-3 fs-5" style="color: var(--text-dark, #1e293b);">
                                    {{ $row['nama_produk'] }}
                                </h6>

                                <div class="mt-auto">
                                    <span class="fw-bold fs-5 text-primary-custom">
                                        {{ $pbo->formatHarga($row['harga']) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endwhile
        </div>
    </div>
@endsection
