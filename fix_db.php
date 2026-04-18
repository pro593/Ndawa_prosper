<?php
include 'includes/db.php';

$conn->query('ALTER TABLE utilisateurs ADD COLUMN mot_de_passe VARCHAR(255)');
$conn->query('ALTER TABLE utilisateurs ADD COLUMN role VARCHAR(50) DEFAULT "client"');

$conn->query('ALTER TABLE commandes DROP FOREIGN KEY commandes_ibfk_1');
$conn->query('ALTER TABLE commandes ADD CONSTRAINT commandes_ibfk_1 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');

$conn->query('ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1');
$conn->query('ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');

echo 'Database fixed';
?>