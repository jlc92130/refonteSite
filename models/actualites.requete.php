<?php
require_once "pdo.php";

function getActualiteFromBD($type) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM actualite where id_type_actualite = :type
    order by date_publication_actualite DESC' ;
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":type",$type);
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


function getLastNews() {
    $bdd = connexionPDO();
    $req = 'SELECT id_actualite, libelle_actualite, contenu_actualite, date_publication_actualite,id_type_actualite, 
    a.id_image, i.url_image, i.libelle_image from actualite a
    INNER JOIN image i ON i.id_image = a.id_image
    where id_type_actualite=:type order by date_publication_actualite 
    DESC LIMIT 1
    ';
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':type',TYPE_NEWS,PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
}
function getLastActionsOrEvents() {
    $bdd = connexionPDO();
    $req = 'SELECT id_actualite, libelle_actualite, contenu_actualite, date_publication_actualite,id_type_actualite, 
    a.id_image,i.libelle_image, i.url_image from actualite a
    INNER JOIN image i ON i.id_image = a.id_image
    where id_type_actualite = :typeAction or id_type_actualite = :typeEvent order by date_publication_actualite 
    DESC LIMIT 1
    ';
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':typeAction',TYPE_ACTIONS,PDO::PARAM_STR);
    $stmt-> bindValue(':typeEvent',TYPE_EVENTS,PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
}
function getTypesActualite() {
   $bdd = connexionPDO();
   $req = 'SELECT * FROM type_actualite';
   $stmt = $bdd->prepare($req);
   $stmt->execute();
   $type_actualites = $stmt->fetchAll();
   return $type_actualites ;
}
 