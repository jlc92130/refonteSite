<?php
ob_start();
echo styleTitreNiveau1("Page de gestion des pensionnaires" , COLOR_PENSIONNAIRE);
?>
<a href="genererPensionnaireAdminAjout">Ajouter</a>
<a href="genererPensionnaireAdminModif">Modifier</a>

<?= $contentAdminAction ?>

<?php if ($alert !== '') { 
    echo afficherAlert($alert,$alertType);
 } ?>


<?php
$content = ob_get_clean();
require "views/commons/template.php"; 
?> 
