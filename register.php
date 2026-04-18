<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nom, email, mot_de_passe)
            VALUES ('$nom', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie";
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button name="submit">S'inscrire</button>
</form>