<?php
    ob_start();

    echo styleTitreNiveau1("Login" , COLOR_PENSIONNAIRE);
 ?>
 


<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 