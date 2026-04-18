<?php
include 'includes/db.php';
$message = "";

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    $stmt = $conn->prepare("INSERT INTO commandes (produit_id, quantite) VALUES (?, ?)");
    $stmt->bind_param("ii", $produit_id, $quantite);

    if($stmt->execute()) $message = "Merci $nom ! Votre commande a été reçue.";
    else $message = "Erreur lors de la commande.";

    $stmt->close();
}

// Récupérer la liste des produits
$result_produits = $conn->query("SELECT id, nom FROM produits");
$produits_list = [];
while($row = $result_produits->fetch_assoc()) $produits_list[] = $row;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commande - RESERVTION EN LIGNE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>faire ta commande</h1>
<?php if($message) echo "<p class='success'>$message</p>"; ?>

<form method="POST">
    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Produit</label>
    <select name="produit_id" required>
        <?php foreach($produits_list as $prod){ ?>
        <option value="<?php echo $prod['id']; ?>"><?php echo $prod['nom']; ?></option>
        <?php } ?>
    </select>

    <label>Quantité</label>
    <input type="number" name="quantite" min="1" value="1" required>

    <button type="submit" name="submit">Commander</button>
</form>

</body>
</html> 