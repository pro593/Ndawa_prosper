<?php
include 'db.php';

$user_id = 1;

$mode = $_POST['mode'] ?? 'MTN Mobile Money';

$total = 0;

$sql = "SELECT p.prix, pa.quantite, pa.produit_id
        FROM panier pa
        JOIN produits p ON pa.produit_id = p.id
        WHERE pa.user_id = $user_id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $total += $row['prix'] * $row['quantite'];
}

$conn->query("INSERT INTO commandes (user_id, total, mode_paiement)
              VALUES ($user_id, $total, '$mode')");

$conn->query("DELETE FROM panier WHERE user_id = $user_id");

echo "<h2>Paiement réussi via $mode ✅</h2>";
echo "<a href='index.php'>Retour boutique</a>";
?>