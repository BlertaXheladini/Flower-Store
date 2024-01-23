<?php

class Database
{
    private $sName = "localhost";
    private $uName = "root";
    private $pass = "";
    private $db_name = "flower-store";

    protected $conn;

    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->sName;dbname=$this->db_name", $this->uName, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->conn = null;
            echo "Connection Failed!" . $e->getMessage();
        }
    }
}
 