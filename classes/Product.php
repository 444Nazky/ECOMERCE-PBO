<?php
include_once __DIR__ . '/Database.php';
include_once __DIR__ . '/ProductInterface.php';
include_once __DIR__ . '/LoggerTrait.php';

class Product extends Database implements ProductInterface
{
    use LoggerTrait;

    // Fungsi utama untuk mengambil data produk
    public function read()
    {
        $query = "SELECT p.*, k.nama_kategori
                  FROM produk p
                  JOIN kategori k ON p.id_kategori = k.id_kategori";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateTax($price)
    {
        return $price * 0.11; // Pajak 11%
    }

    public function getStatus()
    {
        return "Tersedia";
    }

    public function create($id_kat, $nama, $harga, $deskripsi)
    {
        $stmt = $this->conn->prepare("INSERT INTO produk (id_kategori, nama_produk, harga, deskripsi) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$id_kat, $nama, $harga, $deskripsi])) {
            $this->logAction("Produk '$nama' berhasil ditambahkan.");
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $id_kat, $nama, $harga, $desc)
    {
        $stmt = $this->conn->prepare("UPDATE produk SET id_kategori=?, nama_produk=?, harga=?, deskripsi=? WHERE id_produk=?");
        return $stmt->execute([$id_kat, $nama, $harga, $desc, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id_produk = ?");
        return $stmt->execute([$id]);
    }

    public function formatHarga($angka)
    {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}