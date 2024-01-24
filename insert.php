<?php
include('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

function insert() {
    $sql = "INSERT INTO signup (username, email, password, password2) VALUES (?, ?, ?, ?)";
    $stm = $this->dbconn->prepare($sql);
    $stm->execute([$this->username, $this->email, $this->password, $this->password2]);
    echo "<script>
            alert('data is inserted successfully'); 
            document.location='displayDhenat.php';
          </script>";
}
?>