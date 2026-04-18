<?php
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['mot_de_passe'])) {
            echo "Connexion réussie ✅";
        } else {
            echo "Mot de passe incorrect ❌";
        }
    } else {
        echo "Utilisateur non trouvé ❌";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button name="login">Se connecter</button>
</form>