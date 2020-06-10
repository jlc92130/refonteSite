<?php ob_start();?>
<?= styleTitreNiveau1("Erreur", COLOR_CONSEILS); ?>

<div class="alert alert-danger text-center" role="alert">
    <?php echo $errorMessagePDO; ?>
</div>

<?php 
    $content = ob_get_clean();
    $title = "Page d'erreur PDO";
    $description = "Page d'erreur PDO";
    require "views/commons/template.php"
?>
            