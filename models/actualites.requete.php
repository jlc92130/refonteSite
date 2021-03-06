<?php
require_once "pdo.php";

function getActualitesFromBD($type) {
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
function getActualiteFromBD($idActualite) {
    $bdd = connexionPDO();
    $req = 'SELECT id_actualite, libelle_actualite, contenu_actualite, id_type_actualite, i.id_image, i.libelle_image, i.url_image 
    FROM actualite a
    INNER JOIN image i ON i.id_image = a.id_image
    where id_actualite = :actu 
    ';
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':actu',$idActualite,PDO::PARAM_INT);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
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
    where id_type_actualite =:type order by date_publication_actualite 
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
   $typeActualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $typeActualites ;
}
 
function insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$image) {
    $bdd = connexionPDO();
    $req = '
    INSERT INTO actualite (libelle_actualite, id_type_actualite, contenu_actualite, date_publication_actualite, id_image)
    values (:titre, :typeActualite, :contenu, :date, :image) 
    ';
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':titre',$titreActu,PDO::PARAM_STR);
    $stmt-> bindValue(':typeActualite',$typeActu,PDO::PARAM_INT);
    $stmt-> bindValue(':contenu',$contenuActu,PDO::PARAM_STR);
    $stmt-> bindValue(':date',$date,PDO::PARAM_STR); 
    $stmt-> bindValue(':image',$image,PDO::PARAM_INT);
    $res = $stmt->execute();
    $stmt->closeCursor();

    if ($res >0) {
        return true;
    }
    else {
        return false;
    } 
    
}


function updateActualiteIntoBD($idActualite,$titreActu,$contenuActu,$typeActu,$idImage) {
    $bdd = connexionPDO();
    $req = 'UPDATE actualite 
    SET id_actualite = :idActualite, id_type_actualite = :typeActualite, libelle_actualite = :libelle, contenu_actualite = :contenu,
    id_image = :idImage
    WHERE  id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':typeActualite',$typeActu,PDO::PARAM_INT);
    $stmt-> bindValue(':libelle',$titreActu,PDO::PARAM_STR);
    $stmt-> bindValue(':idActualite',$idActualite,PDO::PARAM_INT);
    $stmt-> bindValue(':contenu',$contenuActu,PDO::PARAM_STR);
    $stmt-> bindValue(':idImage',$idImage, PDO::PARAM_INT);
    $res = $stmt-> execute();
    $stmt-> closeCursor();
    if ($res>0) return true ;
    return false;
}

function supprimerActuFromBD($idActualite) {
    $bdd = connexionPDO();
    $req = "DELETE FROM actualite
    WHERE id_actualite = :idActualite
    ";
    $stmt = $bdd->prepare($req);
    $stmt-> bindValue(':idActualite', $idActualite,PDO::PARAM_INT); 
    $stmt-> execute();
    $stmt-> closeCursor();

}

