<?php
require_once "pdo.php";

function getActualiteFromBD() {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM actualite ';
    $stmt = $bdd->prepare($req);
    #$stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->execute();
    $actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);//we fetch one line
    $stmt->closeCursor();
    return $actualites;
}

function getImageActualiteFromBD($idImage) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM image where id_image = :idImage';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idImage',$idImage,PDO::PARAM_INT);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $image;
}

