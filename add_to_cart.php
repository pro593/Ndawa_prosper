<?php
include 'db.php';

$user_id = 1; // utilisateur test
$produit_id = $_GET['id'];

$sql = "INSERT INTO panier (user_id, produit_id, quantite)
        VALUES ($user_id, $produit_id, 1)";

if ($conn->query($sql)) {
    header("Location: cart.php");
}
?>