<?php

class Database
{
    private $dsn = null;
    private $username = "root";
    private $password = "root";
    private $conn;

    public function connect()
    {
        $this->conn = null;
        $this->dsn = "mysql:host=localhost;dbname=test";
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Connection Error: " . $err->getMessage());
        }
        return $this->conn;
    }
}
