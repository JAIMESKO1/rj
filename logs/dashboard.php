<?php
session_start(); // Démarrer la session

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Rediriger vers la page de connexion si non connecté
    exit();
}

echo "Bienvenue sur votre tableau de bord !";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tableau de Bord</h1>
    <a href="logout.php">Se Déconnecter</a>
</body>
</html>
