<?php ob_start();  ?>

<?= styleTitreNiveau1("Ils cherchent une famille", COLOR_ACTUS) ?>
<?php foreach($actualites as $actualite) { ?> 

<?= styleTitrePost("Posté le : <span class='".COLOR_ACTUS."'>".$actualite['date_publication_actualite']."</span> : <span class='".COLOR_ACTUS."'>".$actualite['libelle_actualite']."</span>"); ?>
<div class="row no-gutters align-items-center mt-4" style="min-height:300px;">
    <div class='col-12 col-lg-3 text-center'>
        <img class="img-fluid p-2" src="<?= URL?>public/src/img/Animaux/<?= $actualite['image']['url_image'] ?>" style="max-height:280px;" alt="<?= $actualite['image']['libelle_image'] ?>" >
    </div>
    <div class="col-12 col-md-9">
       <?= $actualite['contenu_actualite'];
       ?>
    </div>
</div>

<?php } ?>



<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>
            