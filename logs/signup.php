<?php
require_once __DIR__ . '/../function/nav-active.php';
require_once 'db.php'; // Inclure la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // Validation des entrées
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hacher le mot de passe
    
    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$email, $password])) {
        header('Location: login.php'); // Rediriger vers la page de connexion après l'inscription
    } else {
        $error = "Une erreur est survenue lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="signup.php" method="POST">
                <h1>Créer un Compte</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit" name="signup">S'inscrire</button>
            </form>
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        </div>
    </div>
</body>
</html>
