<?php
    ob_start();

    echo styleTitreNiveau1("Page d'administration du site" , COLOR_PENSIONNAIRE);
 ?>
 <div class="row">
    <div class="col text-center">
        <a href="genererPensionnaireAdmin" class="btn btn-primary">Gestion des pensionnaires</a>
    </div>
    <div class="col text-center">
        <a href="gererNewsAdmin" class='btn btn-primary'>Gestion des News</a>
    </div>
    <div class="col text-center">
        <form action="" method="POST">
            <input type='hidden' name='deconnexion' value="true" />
            <input type="submit" class="btn btn-primary" value="se deconnecter">
        </form>
    </div>
 </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 