<?php
include 'db.php';

$user_id = 1;

$sql = "SELECT p.nom, p.prix, pa.quantite
        FROM panier pa
        JOIN produits p ON pa.produit_id = p.id
        WHERE pa.user_id = $user_id";

$result = $conn->query($sql);

$total = 0;
?>

<h1>🧺 Mon Panier</h1>

<?php
while($row = $result->fetch_assoc()) {
    echo $row['nom']." - ".$row['prix']." FCFA <br>";
    $total += $row['prix'] * $row['quantite'];
}
?>

<h3>Total: <?php echo $total; ?> FCFA</h3>

<a href="checkout.php">Valider la commande</a>