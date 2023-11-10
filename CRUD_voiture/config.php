<?php
$host = 'localhost'; // Ajoutez le numéro de port 3306 ici
$dbname = 'boulangerie';
$username = 'root';
$password ='';
$port = '3306'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
