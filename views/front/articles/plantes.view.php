<?php 
ob_start();
?>

<?PHP 
    $txt = 'Attention aux plantes <span class="badge badge-danger">toxiques</span> pour les chats !';
    echo styleTitreNiveau1($txt, COLOR_CONSEILS) 
    ?>
    <img class="img-fluid img-thumbnail d-block mx-auto" src="public/src/img/Autres/Articles/plantes.jpg" alt='plantes'/>

<?php 
$content = ob_get_clean();
require "views/template.php"
?>
            
      