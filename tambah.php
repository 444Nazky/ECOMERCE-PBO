<?php
require_once 'classes/Product.php';
if(isset($_POST['simpan'])) {
    $p = new Product();
    $p->create($_POST['id_kat'], $_POST['nama'], $_POST['harga'], $_POST['desc']);
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <form method="POST" class="p-4 border shadow mx-auto" style="max-width: 500px;">
        <h4>Tambah Produk</h4>
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Produk" required>
        <select name="id_kat" class="form-control mb-2">
            <option value="1">Hardware</option>
            <option value="2">Software</option>
        </select>
        <input type="number" name="harga" class="form-control mb-2" placeholder="Harga" required>
        <textarea name="desc" class="form-control mb-2" placeholder="Deskripsi"></textarea>
        <button name="simpan" class="btn btn-primary w-100">Simpan</button>
    </form>
</body>
</html>
