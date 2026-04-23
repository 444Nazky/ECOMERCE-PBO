<?php
require_once 'classes/Product.php';
$pbo = new Product();

// 1. Ambil data lama untuk ditampilkan di form
$id = $_GET['id'];
$data = $pbo->getById($id);

// 2. Proses update saat tombol Simpan ditekan
if(isset($_POST['update'])) {
    $pbo->update($id, $_POST['id_kat'], $_POST['nama'], $_POST['harga'], $_POST['desc']);
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk - PBO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 shadow-sm rounded" style="max-width: 500px;">
        <h4 class="mb-3">Edit Produk</h4>
        <form method="POST">
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kat" class="form-control">
                    <option value="1" <?= $data['id_kategori'] == 1 ? 'selected' : '' ?>>Hardware</option>
                    <option value="2" <?= $data['id_kategori'] == 2 ? 'selected' : '' ?>>Software</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="desc" class="form-control"><?= $data['deskripsi'] ?></textarea>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="update" class="btn btn-warning">Simpan Perubahan</button>
                <a href="admin.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
