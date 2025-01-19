<?php
$host = 'rjwork'; // Remplacez par votre hôte de base de données
$dbname = 'rjwork'; // Remplacez par le nom de votre base de données
$username = 'rjwork'; // Remplacez par votre nom d'utilisateur de base de données
$password = 'Z9v>?e1V;Vqq'; // Remplacez par votre mot de passe de base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
