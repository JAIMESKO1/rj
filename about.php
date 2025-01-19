<?php
$titre = 'À propos';
require_once __DIR__ . '/function/titre_page.php';
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= titre_page($titre) ?></title>
    <?php require_once __DIR__ . '/head/head.php'; ?>
</head>
<body>
    <?php require_once __DIR__ . '/nav/nav-bar/nav-bar.php'; ?>

    <main>
        <?php require_once __DIR__ . '/main/accueil.php'; ?>
    </main>

    <?php require_once __DIR__ . '/footer/footer.php'; ?>

    <!-- Scripts JS -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 1,
        });
    </script>
</body>
</html>
