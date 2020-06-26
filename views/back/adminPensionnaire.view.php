<?php
ob_start();
echo styleTitreNiveau1("Page de gestion des pensionnaires" , COLOR_PENSIONNAIRE);
?>
<div>
    
</div>



<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 
