<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connection.php');
require_once('insert.php');

class Studenti {
    private $id;
    private $username;
    private $email;
    private $password;
    private $password2;

    public function __construct($id = '', $username = '', $email = '', $password = '', $password2 = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
        $this->dbconn = $this->getConnection();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword2($password2)
    {
        $this->password2 = $password2;
    }

    public function getPassword2()
    {
        return $this->password2;
    }

public function insert()
{
    try {
        $sql = "INSERT INTO signup (username, email, password, password2) VALUES (?, ?, ?, ?)";
        $stm = $this->dbconn->prepare($sql);
        $stm->execute([$this->username, $this->email, $this->password, $this->password2]);

        echo "<script>
            alert('Data is inserted successfully'); 
            document.location='displayDhenat.php';
        </script>";
    } catch (PDOException $e) {
        echo "<script>
            alert('Error: Unable to save data. {$e->getMessage()}'); 
            document.location='displayDhenat.php';
        </script>";
    }
}
}

?>
