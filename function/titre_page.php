<?php
function titre_page(?string $titre = null): void {
    
    $titre = $titre ?? 'Rjwork';


    echo htmlspecialchars($titre, ENT_QUOTES, 'UTF-8');
}
?>
