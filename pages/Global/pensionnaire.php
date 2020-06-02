<?php
include("../Commons/header.php");

require_once "pdo.php";


    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_statut = ? ";
    if ((int) $_GET['idStatut'] === ID_STATUT_ADOPTE) {
        $req .= "or id_statut =".ID_STATUT_MORT;
    }
    $stmt = $bdd->prepare($req);
    $stmt->execute(array($_GET['idStatut']));
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

 if ( (int) $_GET['idStatut'] === 1) {
    echo styleTitreNiveau1( TITRE_ANIMAL_ATTENTE , COLOR_PENSIONNAIRE); 
 } elseif ( (int) $_GET['idStatut'] === 3) {
    echo styleTitreNiveau1( TITRE_ANIMAL_FALD , COLOR_PENSIONNAIRE); 
 } else {
    echo styleTitreNiveau1( TITRE_ANIMAL_ANCIEN , COLOR_PENSIONNAIRE);
 }
 ?>
<div class='row no-gutters'>
    <?php foreach($animaux as $animal) { 
        $stmt = $bdd->prepare('SELECT i.id_image, i.libelle_image, i.url_image, i.description_image  FROM `image` i
            INNER JOIN contient c ON c.id_image = i.id_image
            INNER JOIN animal a ON c.id_animal = a.id_animal
            WHERE a.id_animal = ?
            LIMIT 1'); // we only want one image because an animal can have many images
        $stmt->execute(array($animal['id_animal']));
        $image = $stmt->fetch(PDO::FETCH_ASSOC);//we fetch one line
        $stmt->closeCursor();
    ?>
    <div class="col-12 col-lg-6">
        <div class='row border border-dark rounded-lg m-2 align-items-center
        <?php echo ($animal["sexe"] == 1) ? "perso_bgGreen" : "perso_bgPink";
        ?>'
        style="height:200px;">
            <div class="col p-2 text-center">
                <img src='../../src/img/Animaux/<?php echo $image['url_image'] ?>' class="img-thumbnail" style="max-height:180px" alt="<?php echo $image['libelle_image'] ?>" />
            </div>
            <div class="col-2 border-left border-right border-dark text-center">
                <?php
                    $iconeChien = ""; 
                    if ($animal['ami_chien'] === "oui") $iconeChien = "chienOK";
                    elseif ($animal['ami_chien'] === "non") $iconeChien = "chienBar";
                    else $iconeChien = "chienQuest";
                ?>
                    <img src='../../src/img/Autres/icones/<?php echo $iconeChien ?>.png' class="img-fluid m-1" style="width:50px;" alt="<?php echo $iconeChien ?>" />
                <?php
                    $iconeChat = ""; 
                    if ($animal['ami_chat'] === "oui")  $iconeChat = "chatOK";
                    elseif ($animal['ami_chat'] === "non")  $iconeChat = "chatBar";
                    else $iconeChat = "chatQuest";
                ?>
                    <img src='../../src/img/Autres/icones/<?php echo $iconeChat ?>.png' class="img-fluid m-1" style="width:50px;" alt="<?php echo $iconeChat ?>" />
                <?php
                    $iconeBaby = ""; 
                    if ($animal['ami_enfant'] === "oui")  $iconeBaby = "babyOK";
                    elseif ($animal['ami_enfant'] === "non")  $iconeBaby = "babyBar";
                    else $iconeBaby = "babyQuest";
                ?>
                    <img src='../../src/img/Autres/icones/<?php echo $iconeBaby ?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
            </div>
            <div class="col-6 text-center">
                <div class="perso_policeTitre perso_size20 mb-3"><?php echo $animal["nom_animal"] ?></div>
                <div class="mb-2">Né : <?php echo $animal['date_naissance_animal'] ?></div>
                
                <?php
                    $stmt = $bdd->prepare('SELECT c.id_caractere, c.libelle_caractere 
                        FROM caractere c 
                        INNER JOIN dispose d ON c.id_caractere = d.id_caractere
                        INNER JOIN animal a ON a.id_animal = d.id_animal
                        WHERE a.id_animal = ?
                        LIMIT 3
                        ');
                    $stmt->execute(array($animal['id_animal']));
                    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $stmt->closeCursor();
                ?>
                <div class="my-3">
                    <?php foreach($caracteres as $caractere) { ?>
                        <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?php echo $caractere["libelle_caractere"] ?> </span>
                    <?php } ?>
                </div>
                <a href="../Global/animal.php?idAnimal=<?php echo $animal["id_animal"] ?>"  class="btn btn-primary">Visiter ma page </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include("../Commons/footer.php"); ?>