<?php
    ob_start();

    echo styleTitreNiveau1( TITRE_ANIMAL_FALD , COLOR_PENSIONNAIRE);
 ?>
<div class='row no-gutters'>
    
    <?php foreach($animaux as $animal) { ?>
    <div class="col-12 col-lg-6">
        <div class='row border border-dark rounded-lg m-2 align-items-center
        <?php echo ($animal["sexe"] == 1) ? "perso_bgGreen" : "perso_bgPink";
        ?>'
        style="height:200px;" >
            <div class="col p-2 text-center">
                <img src='<?= URL?>public/src/img/Animaux/<?php echo $animal['image']['url_image'] ?>' class="img-thumbnail" style="max-height:180px" alt="<?php echo $animal['image']['libelle_image'] ?>" />
            </div>
            <div class="col-2 border-left border-right border-dark text-center">
                <?php
                    $iconeChien = ""; 
                    if ($animal['ami_chien'] === "oui") $iconeChien = "chienOK";
                    elseif ($animal['ami_chien'] === "non") $iconeChien = "chienBar";
                    else $iconeChien = "chienQuest";
                ?>
                    <img src='<?= URL?>public/src/img/Autres/icones/<?php echo $iconeChien ?>.png' class="img-fluid m-1" style="width:50px;" alt="<?php echo $iconeChien ?>" />
                <?php
                    $iconeChat = ""; 
                    if ($animal['ami_chat'] === "oui")  $iconeChat = "chatOK";
                    elseif ($animal['ami_chat'] === "non")  $iconeChat = "chatBar";
                    else $iconeChat = "chatQuest";
                ?>
                    <img src='<?= URL?>public/src/img/Autres/icones/<?php echo $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt="<?php echo $iconeChat ?>" />
                <?php
                    $iconeBaby = ""; 
                    if ($animal['ami_enfant'] === "oui")  $iconeBaby = "babyOK";
                    elseif ($animal['ami_enfant'] === "non")  $iconeBaby = "babyBar";
                    else $iconeBaby = "babyQuest";
                ?>
                    <img src='public/src/img/Autres/icones/<?php echo $iconeBaby ?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
            </div>
            <div class="col-6 text-center">
                <div class="perso_policeTitre perso_size20 mb-3"><?php echo $animal["nom_animal"] ?></div>
                <div class="mb-2">Né : <?php echo $animal['date_naissance_animal'] ?></div>
                
                
                <div class="my-3">
                    <?php foreach($animal['caracteres'] as $caractere) { ?>
                        <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?php  echo ($animal['sexe'])? $caractere["libelle_caractere_m"]:$caractere["libelle_caractere_f"] ?> </span>
                    <?php } ?>
                </div>
                <a href="<?= URL ?>animal&idAnimal=<?php echo $animal["id_animal"] ?>"  class="btn btn-primary">Visiter ma page </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 