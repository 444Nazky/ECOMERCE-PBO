<?php
require_once 'classes/Product.php';
$pbo = new Product();
$dataProduk = $pbo->read();
$title = "SMK Pedia | Belanja Produk SMK Lebih Mudah";
include_once 'templates/header.php';
?>

<div class="container">
    <div class="p-5 mb-4 bg-success rounded-4 text-white shadow">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Gadget & Software Lokal</h1>
            <p class="col-md-8 fs-4">Dapatkan produk karya siswa SMK Plus Pelita Nusantara dengan harga terbaik dan kualitas terjamin.</p>
            <button class="btn btn-light btn-lg px-4 fw-bold text-success" type="button">Cek Promo Hari Ini</button>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Rekomendasi Untukmu</h4>
        <a href="#" class="text-success text-decoration-none">Lihat Semua</a>
    </div>

    <div class="row row-cols-2 row-cols-md-4 g-4">
        <?php while($row = $dataProduk->fetch_assoc()): ?>
            <div class="col">
                <div class="card h-100 border-0 card-product shadow-sm">
                    <img src="https://via.placeholder.com/300x300?text=<?= urlencode($row['nama_produk']) ?>" class="card-img-top rounded-top-4" alt="...">
                    <div class="card-body">
                        <p class="text-muted small mb-1"><?= $row['nama_kategori'] ?></p>
                        <h6 class="card-title fw-bold text-dark mb-2"><?= $row['nama_produk'] ?></h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-success fw-bold"><?= $pbo->formatHarga($row['harga']) ?></span>
                        </div>
                        <div class="mt-2">
                            <i class="bi bi-star-fill text-warning small"></i>
                            <i class="bi bi-star-fill text-warning small"></i>
                            <i class="bi bi-star-fill text-warning small"></i>
                            <i class="bi bi-star-fill text-warning small"></i>
                            <span class="text-muted small">(4.8)</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-outline-success w-100 btn-sm fw-bold">
                            <i class="bi bi-plus-lg me-1"></i> Keranjang
                        </button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once 'templates/footer.php'; ?>
