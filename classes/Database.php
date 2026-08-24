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
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Koneksi Error: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
