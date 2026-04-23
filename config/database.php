<?php
abstract class Database
{
    protected $host = "127.0.0.1";
    protected $db_name = "db_toko";
    protected $username = "root";
    protected $password = "";
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name, 3306);
        } catch (Exception $e) {
            die("Koneksi Error: " . $e->getMessage());
        }
    }
}
