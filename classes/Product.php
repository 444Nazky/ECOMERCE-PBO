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
        return $this->conn->query($query);
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
        // Sanitasi input agar aman dari karakter aneh
        $nama = $this->conn->real_escape_string($nama);
        $deskripsi = $this->conn->real_escape_string($deskripsi);

        $sql = "INSERT INTO produk (id_kategori, nama_produk, harga, deskripsi) 
                VALUES ('$id_kat', '$nama', '$harga', '$deskripsi')";

        if ($this->conn->query($sql)) {
            $this->logAction("Produk '$nama' berhasil ditambahkan.");
            return true;
        }
        return false;
    }

    public function getById($id)
    {
        $result = $this->conn->query("SELECT * FROM produk WHERE id_produk = '$id'");
        return $result->fetch_assoc();
    }

    public function update($id, $id_kat, $nama, $harga, $desc)
    {
        return $this->conn->query("UPDATE produk SET id_kategori='$id_kat', nama_produk='$nama', harga='$harga', deskripsi='$desc' WHERE id_produk='$id'");
    }

    public function delete($id)
    {
        return $this->conn->query("DELETE FROM produk WHERE id_produk = '$id'");
    }

    public function formatHarga($angka)
    {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}