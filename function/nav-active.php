<?php
function nav_active(string $titre, string $link): string {
    
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    
    
    $escapedTitre = htmlspecialchars($titre, ENT_QUOTES, 'UTF-8');
    $escapedLink = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');

    
    $class = ($currentUri === $link) ? 'active' : '';

    return '<li class="' . $class . '"><a href="' . $escapedLink . '">' . $escapedTitre . '</a></li>';
}
?>
