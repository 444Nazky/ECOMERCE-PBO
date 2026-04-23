<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Nazkuy'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#4A6CF7',
                            hover: '#3A5CE5',
                        },
                        lavender: '#F3F4FF',
                        light: '#E1E7FE',
                        dark: '#1e293b'
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    borderRadius: {
                        '4xl': '24px',
                        '5xl': '28px',
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        :root {
            --primary-blue: #4A6CF7;
            --hover-blue: #3A5CE5;
            --light-blue: #E1E7FE;
            --text-dark: #1e293b;
        }

        body {
            background-color: #F3F4FF;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar dengan efek Glassmorphism (Kaca) */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        /* Styling Teks Logo */
        .brand-text {
            color: var(--text-dark);
        }

        .brand-highlight {
            color: var(--primary-blue);
        }

        /* Tombol Utama (Seller Center) dengan Gradasi & Shadow */
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, var(--primary-blue));
            border: none;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-blue), var(--hover-blue));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        /* Kolom Pencarian Custom */
        .search-box {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: 0.3s;
        }

        .search-box:focus-within {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px var(--light-blue);
        }

        .search-box input {
            border: none !important;
            box-shadow: none !important;
        }

        .search-box button {
            border: none !important;
            background: transparent;
            color: var(--primary-blue);
        }

        .search-box button:hover {
            background-color: var(--light-blue);
        }

        /* Ikon Keranjang Interaktif */
        .nav-icon {
            color: #475569;
            transition: all 0.3s ease;
        }

        .nav-icon:hover {
            color: var(--primary-blue);
            transform: scale(1.15) rotate(-5deg);
        }

        /* Kartu Produk (Untuk index.php nanti) */
        .card-product:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.1);
            border-color: var(--light-blue);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="bi bi-bag-heart-fill fs-3 me-2" style="color: var(--primary-blue);"></i>
                <span class="fw-bold brand-text fs-4">SMK<span class="brand-highlight">PEDIA</span></span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto me-4 w-50">
                    <div class="input-group search-box bg-white overflow-hidden">
                        <input class="form-control py-2 ps-3" type="search"
                            placeholder="Cari laptop, software, atau aksesori...">
                        <button class="btn px-3" type="submit">
                            <i class="bi bi-search fw-bold"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-4">
                        <a class="nav-link position-relative nav-icon p-0" href="#">
                            <i class="bi bi-cart3 fs-4"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white border-2">
                                0
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary px-4 py-2" href="admin.php">
                            <i class="bi bi-shop me-1"></i> Seller Center
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">