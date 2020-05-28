<?php
include("../Commons/header.php");
require_once "config.php";
require_once "pdo.php";


    $bdd = connexionPDO();
    $stmt = $bdd->prepare("SELECT * FROM animal ");
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    
?>
<?= styleTitreNiveau1("Ils cherchent une famille", COLOR_PENSIONNAIRE) ?>

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
        <div class='row border perso_bgGreen border-dark rounded-lg m-2 align-items-center perso_bgRose' style="height:200px;">
            <div class="col p-2 text-center">
                <img src='../../src/img/Animaux/<?php echo $image['url_image'] ?>' class="img-thumbnail" style="max-height:180px;" alt="<?php echo $image['libelle_image'] ?>" />
            </div>
            <div class="col-2 border-left border-right border-dark text-center">
                <img src='../../src/img/Autres/icones/ChienOk.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
                <img src='../../src/img/Autres/icones/ChatOk.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
                <img src='../../src/img/Autres/icones/BabyOk.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
            </div>
            <div class="col-6 text-center">
                <div class="perso_policeTitre perso_size20 mb-3"><?php echo $animal["nom_animal"] ?></div>
                <div class="mb-2">Né : <?php echo $animal['date_naissance_animal'] ?></div>
                <div class="my-3">
                    <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> douce </span>
                    <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> calme </span>
                    <span class="badge badge-warning m-1 p-2 d-none d-md-inline"> joueuse </span>
                </div>
                <a href="../Global/animal.php" class="btn btn-primary">Visiter ma page </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include("../Commons/footer.php"); ?>