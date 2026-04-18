<?php
include 'db.php';

echo "<h1>📦 Commandes</h1>";

$result = $conn->query("SELECT * FROM commandes");

while($row = $result->fetch_assoc()) {
    echo "Commande #".$row['id']." - ".$row['total']." FCFA<br>";
}
?>

<hr>

<h2>➕ Ajouter produit</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nom" placeholder="Nom" required><br>
    <input type="number" name="prix" placeholder="Prix" required><br>
    <input type="file" name="image" required><br>
    <button name="add">Ajouter</button>
</form>

<?php
if (isset($_POST['add'])) {

    $nom = $_POST['nom'];
    $prix = $_POST['prix'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/".$image);

    $conn->query("INSERT INTO produits (nom, prix, image)
                  VALUES ('$nom', $prix, '$image')");

    echo "Produit ajouté avec image ✅";
}
?>