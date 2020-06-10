<?php ob_start();?>
<?= styleTitreNiveau1("Erreur", COLOR_CONSEILS); ?>

<div class="alert alert-danger text-center" role="alert">
<?php echo $errorMessage; ?>
</div>

<?php 
    $content = ob_get_clean();
    $title = "Page d'erreur";
    $description = "Page d'erreur";
    require "views/commons/template.php"
?>
            
      