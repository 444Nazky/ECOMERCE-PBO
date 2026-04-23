<?php
require_once 'classes/Product.php';

if(isset($_GET['id'])) {
    $pbo = new Product();
    $pbo->delete($_GET['id']);
    $pbo->logAction("Produk ID " . $_GET['id'] . " dihapus dari sistem.");
}

header("Location: admin.php");
?>
