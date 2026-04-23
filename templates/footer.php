</main>

<style>
    /* Tambahan Styling Khusus Footer */
    .footer-custom {
        background-color: #0f172a;
        /* Biru gelap elegan (Slate) */
        color: #f8fafc;
        border-top: 4px solid var(--primary-blue);
    }

    .footer-link {
        color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        margin-bottom: 8px;
    }

    .footer-link:hover {
        color: var(--light-blue);
        transform: translateX(5px);
        /* Efek geser kanan saat disorot */
    }

    .social-icon {
        color: #94a3b8;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .social-icon:hover {
        color: var(--primary-blue);
        transform: translateY(-5px) scale(1.1);
        /* Efek melompat */
    }

    .shipping-icon {
        color: #475569;
        transition: 0.3s;
        cursor: pointer;
    }

    .shipping-icon:hover {
        color: var(--light-blue);
    }
</style>

<footer class="footer-custom pt-5 pb-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a class="text-decoration-none d-flex align-items-center mb-3" href="index.php">
                    <i class="bi bi-bag-heart-fill fs-3 me-2" style="color: var(--primary-blue);"></i>
                    <span class="fw-bold fs-4 text-white">NAZKY<span
                            style="color: var(--primary-blue);">PEDIA</span></span>
                </a>
                <p class="small" style="color: #94a3b8; line-height: 1.6;">
                    Platform e-commerce karya siswa SMK untuk mendukung kreativitas dan ekonomi lokal. Bangga buatan
                    SMK!
                </p>
            </div>

            <div class="col-md-2 mb-4">
                <h6 class="fw-bold text-white mb-3">Layanan</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="footer-link"><i class="bi bi-chevron-right small me-1"></i> Bantuan</a></li>
                    <li><a href="#" class="footer-link"><i class="bi bi-chevron-right small me-1"></i> Cara Bayar</a>
                    </li>
                    <li><a href="#" class="footer-link"><i class="bi bi-chevron-right small me-1"></i> Lacak Pesanan</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 mb-4 text-center">
                <h6 class="fw-bold text-white mb-3">Ikuti Kami</h6>
                <div class="fs-4 d-flex justify-content-center gap-4">
                    <i class="bi bi-instagram social-icon" title="Instagram"></i>
                    <i class="bi bi-facebook social-icon" title="Facebook"></i>
                    <i class="bi bi-youtube social-icon" title="YouTube"></i>
                    <i class="bi bi-tiktok social-icon" title="TikTok"></i>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold text-white mb-3 text-md-end text-center">Metode Pengiriman</h6>
                <div class="d-flex flex-wrap gap-3 fs-3 justify-content-md-end justify-content-center">
                    <i class="bi bi-truck shipping-icon" title="Reguler"></i>
                    <i class="bi bi-box-seam shipping-icon" title="Kargo"></i>
                    <i class="bi bi-bicycle shipping-icon" title="Sameday"></i>
                </div>
            </div>
        </div>

        <hr class="my-4" style="border-color: #334155;">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small"
            style="color: #64748b;">
            <div class="mb-2 mb-md-0">
                &copy; <?= date('Y'); ?> SMK Plus Pelita Nusantara.
            </div>
            <div>
                Build with <i class="bi bi-heart-fill text-danger mx-1"></i> for Learning.
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>