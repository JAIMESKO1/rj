<?php
require_once __DIR__ . '/../db.php';
session_start(); // Démarrer la session

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Vérifier l'utilisateur dans la base de données
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Enregistrer l'ID de l'utilisateur dans la session
        header('Location: dashboard.php'); // Rediriger vers le tableau de bord
    } else {
        $error = "Identifiants invalides.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1>Connexion</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit" name="login">Se Connecter</button>
            </form>
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        </div>
    </div>
</body>
</html>
