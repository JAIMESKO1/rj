<?php 
   require_once __DIR__ . '/../../function/nav-active.php';
?>

<body>
<nav>
    <a href="/index.php" class="logo">
        <img src="img/IMG_2566 (2).png" alt="Logo du site">
    </a>
    <ul class="navlist">
        <?= nav_active('Accueil', '/index.php') ?>
        <?= nav_active('À propos', '/about.php') ?>
        <?= nav_active('Contact', '/contact.php') ?>
    </ul>
    <div class="right-content">
        <a href="/logs/signup.php" class="nav-btn">Sign up</a>
        <a href="/logs/login.php" class="nav-btn">Login</a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const activeLink = document.querySelector('.navlist .active');

        if (activeLink) {
            const activeLinkRect = activeLink.getBoundingClientRect();
            const navListRect = document.querySelector('.navlist').getBoundingClientRect();
        
            const barLeft = activeLinkRect.left - navListRect.left;
            const barWidth = activeLinkRect.width;
        
            document.documentElement.style.setProperty('--bar-left', `${barLeft}px`);
            document.documentElement.style.setProperty('--bar-width', `${barWidth}px`);
        } else {
            console.warn("Aucun lien actif trouvé.");
        }
    });
</script>


</body>
