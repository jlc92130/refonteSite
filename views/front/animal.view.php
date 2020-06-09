<?php ob_start(); ?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_PENSIONNAIRE) ?>

<div class='row border border-dark <?php echo ($animal["sexe"] == 1) ? "perso_bgGreen" : "perso_bgPink"; ?> rounded-lg m-2 align-items-center'>
    <div class="col p-2 text-center">
        <img src='public/src/img/Animaux/<?php echo $images[0]['url_image'] ?>' class="img-thumbnail" style="max-height:180px;" alt=<?php echo $images[0]['libelle_image'] ?> />
    </div>

    <?php
        $iconeChien = ""; 
        if ($animal['ami_chien'] === "oui") $iconeChien = "chienOK";
        elseif ($animal['ami_chien'] === "non") $iconeChien = "chienBar";
        else $iconeChien = "chienQuest";
    
        $iconeChat = ""; 
        if ($animal['ami_chat'] === "oui")  $iconeChat = "chatOK";
        elseif ($animal['ami_chat'] === "non")  $iconeChat = "chatBar";
        else $iconeChat = "chatQuest";
   
        $iconeBaby = ""; 
        if ($animal['ami_enfant'] === "oui")  $iconeBaby = "babyOK";
        elseif ($animal['ami_enfant'] === "non")  $iconeBaby = "babyBar";
        else $iconeBaby = "babyQuest";
    ?>

    <div class="col-2 border-left border-right border-dark text-center">
        <img src='public/src/img/Autres/icones/<?php echo $iconeChien ?>.png' class="img-fluid m-1" style="width:50px;" alt=<?php echo $iconeChien ?> />
        <img src='public/src/img/Autres/icones/<?php echo $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt=<?php echo $iconeChat ?> />
        <img src='public/src/img/Autres/icones/<?php echo $iconeBaby ?>.png' class="img-fluid m-1" style="width:50px;" alt=<?php echo $iconeBaby ?> />
    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="perso_policeTitre perso_size20 mb-3">Puce: <?php echo $animal['puce'] ?></div>
        <div class="mb-2">Né : <?php echo $animal['date_naissance_animal'] ?></div>

        

        <div class="my-3">
            <?php foreach($caracteres as $caractere) { ?>
                <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?php echo ($animal['sexe'])? $caractere['libelle_caractere_m']:$caractere['libelle_caractere_f'] ?> </span>
            <?php } ?>
        </div>
    </div>
    <div class="col-12 col-md-4">
        Frais d'adoption : 60€<br />
        Vaccins : 35€ (à la demande de l'adoptant)<br />
        Stérilisation : caution de 200 € vous sera demandée (rendue après réception du certificat)
    </div>
</div>


<div class="row align-items-center no-gutters">
    <div class="col-12 col-md-6" >
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach($images as $key=>$image) { ?>
                <div class="carousel-item <?php echo ($key === 0) ? 'active':'' ?> ">
                    <img src="public/src/img/Animaux/<?php echo $image['url_image'] ?>" class="img-thumbnail" style=" height:400px;width:400px" alt="<?= $image['libelle_image']?>">
                </div>
                <?php } ?>
            </div>
        </div>       
    </div>
    
    <div class="col-12 col-md-6">
        <div>  
            <?= styleTitreNiveau2("Qui suis-je ?", COLOR_PENSIONNAIRE) ?>
            <?php
                echo $animal['description_animal'];
            ?>
        </div>
        <hr />
        <div>
            <img src="public/src/img/Autres/icones/IconeAdopt.png" alt="" width="50" height="50" class="d-block mx-auto">
            <?php echo $animal['adoption_description_animal']  ?>
        </div>
        <hr />
        <div>
            <img src="public/src/img/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
            <?php echo $animal['localisation_description_animal']  ?>
        </div>
        <hr />
        <div>
            <img src="public/src/img/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
            <?php echo $animal['engagement_description_animal']  ?>
        </div>
    </div>
</div>    
<?php 
 $content = ob_get_clean();
 require "views/template.php"; 
?>