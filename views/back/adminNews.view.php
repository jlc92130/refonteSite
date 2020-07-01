<?php
ob_start();
echo styleTitreNiveau1("Page de gestion des news" , COLOR_PENSIONNAIRE);
?>
<a href="genererNewsAdminAjout">Ajouter</a>
<a href="genererNewsAdminModif">Modifier</a>
 

<?= $contentAdminAction ?>

<?php if ($alert !== '') { 
    echo afficherAlert($alert,$alertType);
 } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 




