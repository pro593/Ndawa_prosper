<?php
include 'includes/db.php';

// Récupérer les statistiques
$produits = $conn->query("SELECT COUNT(*) AS total FROM produits")->fetch_assoc()['total'] ?? 0;
$commandes = $conn->query("SELECT COUNT(*) AS total FROM commandes")->fetch_assoc()['total'] ?? 0;
$utilisateurs = $conn->query("SELECT COUNT(*) AS total FROM utilisateurs")->fetch_assoc()['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tableau de bord - RESERVATION EN LIGNE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Tableau de bord</h1>
</header>

<section class="dashboard">
    <div class="card produits">
        <h3>Produits</h3>
        <p><?php echo $produits; ?> produits</p>
        <a href="#">Gérer les produits</a>
    </div>
    <div class="card commandes">
        <h3>Commandes</h3>
        <p><?php echo $commandes; ?> commandes</p>
        <a href="#">Gérer les commandes</a>
    </div>
    <div class="card utilisateurs">
        <h3>Utilisateurs</h3>
        <p><?php echo $utilisateurs; ?> utilisateurs</p>
        <a href="#">Gérer les utilisateurs</a>
    </div>
    <div class="card client">
        <h3>Passer une commande</h3>
        <a href="commande_client.php">Commander en ligne</a>
    </div>
</section>

</body>
</html>