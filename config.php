<?php
$servername = "localhost"; 
$db = "flowerstore"; 
$username = "root"; 
$password = ""; 




$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];


try {

$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password, $options);


$result = $conn->query("SELECT 1");
if ($result !== false) {
    echo "<br>Database connection is working.";
} else {
    echo "<br>Database connection is established, but there is an issue.";
}

}
catch(PDOException $e)
{
echo " Lidhja dështoi: " . $e->getMessage();

die();


}
?>