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
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Koneksi Error: " . $e->getMessage());
        }
    }
}
