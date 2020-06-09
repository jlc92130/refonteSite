<?php 
ob_start();
echo styleTitreNiveau1('Association les chatons - Nos Animaux <br /> Dijon</h1>',COLOR_ASSO); 
?>

<?php echo styleTitreNiveau1('Les Partenaires',COLOR_ASSO ) ?>
<div class="row no-gutters">
    <div class="card col-auto mx-auto mt-2" style="width: 18rem;">
        <img src="public/src/img/Autres/ecoute.png" class="card-img-top p-1" alt="Ecoutetonchien">
        <div class="card-body text-center">
            <h5 class="card-title perso_ColorRoseMenu perso_policeTitre perso_textShadow">ecoutetonchien21-39</h5>
            <p class="card-text">
                Contactez un éducateur canin, contactez Ecoute ton chien
            </p>
            <a href="https://www.ecoutetonchien21-39.com/" target=_blank class="btn btn-primary">Visiter le site de l'éducatrice &raquo;</a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>
