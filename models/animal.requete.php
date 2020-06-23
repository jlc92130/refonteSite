<?php
require_once "pdo.php";

function getAnimalFromStatut($idStatut) {
    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_statut = :id_stat ";
    if ($idStatut === ID_STATUT_ADOPTE) {
        $req .= "or :id_statut =".ID_STATUT_MORT;
    }
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':id_stat',$idStatut,PDO::PARAM_INT);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function getFirstImageAnimal($animal) {
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT i.id_image, i.libelle_image, i.url_image, i.description_image  FROM `image` i
    INNER JOIN contient c ON c.id_image = i.id_image
    INNER JOIN animal a ON c.id_animal = a.id_animal
    WHERE a.id_animal = ?
    LIMIT 1'); // we only want one image because an animal can have many images
    $stmt->execute(array($animal));
    $image = $stmt->fetch(PDO::FETCH_ASSOC);//we fetch one line
    $stmt->closeCursor();
    return $image;
}

function getAllCaracters($animal) {
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT c.id_caractere, c.libelle_caractere_m, c.libelle_caractere_f 
    FROM caractere c 
    INNER JOIN dispose d ON c.id_caractere = d.id_caractere
    INNER JOIN animal a ON a.id_animal = d.id_animal
    WHERE a.id_animal = ?
    LIMIT 3
    ');
    $stmt->execute(array($animal));
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $caracteres;
}
function getAnimalFromIdAnimalBD($idAnimal) {
    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_animal = ?";
    $stmt = $bdd->prepare($req);
    $stmt->execute(array($idAnimal));
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animal;
}

function getImagesFromAnimal($idAnimal) {
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT i.id_image, i.libelle_image, i.url_image, i.description_image  FROM `image` i
    INNER JOIN contient c ON c.id_image = i.id_image
    INNER JOIN animal a ON c.id_animal = a.id_animal
    WHERE a.id_animal = ?
    '); // we fetch all the images for one animal 
    $stmt->execute(array($idAnimal));
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);//we fetch all the lines
    $stmt->closeCursor();
    return $images;
}


