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

function getStatutsAnimal() {
    $bdd = connexionPDO();
    $req = "SELECT * FROM statut";
    $stmt = $bdd->prepare($req);
    $stmt-> execute();
    $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $statuts;

}

function getListeCaracteresAnimal() {
    $bdd = connexionPDO();
    $req = "SELECT * FROM caractere ";
    $stmt = $bdd->prepare($req);
    $stmt-> execute();
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $caracteres;
}

function insertAnimalIntoBD($nom,$dateN,$puce,$type,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description,
    $adoptionDesc,$localisation,$engagement) {
        $bdd = connexionPDO();
        $req = "INSERT INTO animal (nom_animal, type_animal, puce, sexe, date_naissance_animal, ami_chien,ami_chat,ami_enfant,description_animal,adoption_description_animal,localisation_description_animal,engagement_description_animal,id_statut)
        values (:nom, :type, :puce, :sexe, :dateN, :amiChien, :amiChat, :amiEnfant, :description, :adoptionDesc, :localisation, :engagement, :statut)";
        $stmt= $bdd->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":type",$type,PDO::PARAM_STR);
        $stmt->bindValue(":puce",$puce,PDO::PARAM_STR);
        $stmt->bindValue(":sexe",$sexe,PDO::PARAM_INT);
        $stmt->bindValue(":dateN",$dateN,PDO::PARAM_STR);
        $stmt->bindValue(":amiChien",$amiChien,PDO::PARAM_STR);
        $stmt->bindValue(":amiChat",$amiChat,PDO::PARAM_STR);
        $stmt->bindValue(":amiEnfant",$amiEnfant,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":adoptionDesc",$adoptionDesc,PDO::PARAM_STR);
        $stmt->bindValue(":localisation",$localisation,PDO::PARAM_STR);
        $stmt->bindValue(":engagement",$engagement,PDO::PARAM_STR);
        $stmt->bindValue(":statut",$statut,PDO::PARAM_INT); 
        $stmt->execute();
        $res = $bdd->lastInsertId();
        $stmt->closeCursor();
    return $res;
}

function insertIntoContient($idAnimal,$idImage) {
    $bdd = connexionPDO();
    $req = "INSERT INTO contient (id_image,id_animal) values (:idImage,:idAnimal)";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idAnimal',$idAnimal,PDO::PARAM_INT);
    $stmt->bindValue(':idImage',$idImage,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();

}
function insertIntoDispose($caractere,$idAnimal) {
    $bdd = connexionPDO();
    $req = "INSERT INTO dispose (id_caractere,id_animal) values (:caractere,:idAnimal)";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':caractere',$caractere,PDO::PARAM_INT);
    $stmt->bindValue(':idAnimal',$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}
function getAnimauxFromTypeAndStatut($type,$idStatut) {

    $bdd = connexionPDO();
    $req = "SELECT * FROM animal WHERE id_statut = :idStatut AND type_animal = :type";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idStatut',$idStatut,PDO::PARAM_INT);
    $stmt->bindValue(':type',$type,PDO::PARAM_STR);
    $stmt->execute();
    $animaux = $stmt->fetchAll();
    $stmt->closeCursor();
    return $animaux;
}
function getAnimalCaracteresBD($idAnimal) {
    $bdd = connexionPDO();
    $req = "SELECT * FROM dispose  
    WHERE id_animal = :idAnimal";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idAnimal',$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $caracteres = $stmt->fetchAll();
    $stmt->closeCursor();
    //we have all the (id_caractere,id_animal) for a particular animal
    return $caracteres;
}