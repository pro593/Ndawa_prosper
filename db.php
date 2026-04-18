<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DIGITAL-SHOP";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>