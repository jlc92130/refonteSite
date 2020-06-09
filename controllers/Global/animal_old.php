<?php

$bdd = connexionPDO();
$req = "SELECT * FROM animal WHERE id_animal = ?";
$stmt = $bdd->prepare($req);
$stmt->execute(array($_GET['idAnimal']));
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();
// on selection l image de l'animal
$stmt = $bdd->prepare('SELECT i.id_image, i.libelle_image, i.url_image, i.description_image  FROM `image` i
    INNER JOIN contient c ON c.id_image = i.id_image
    INNER JOIN animal a ON c.id_animal = a.id_animal
    WHERE a.id_animal = ?
    '); // we fetch all the images for one animal 
$stmt->execute(array($_GET['idAnimal']));
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);//we fetch all the lines
$stmt->closeCursor();

    $req = 'SELECT * 
    FROM caractere c
    INNER JOIN dispose d ON c.id_caractere = d.id_caractere
    INNER JOIN animal a ON a.id_animal = d.id_animal
    WHERE a.id_animal = :idAnimal
    LIMIT 3
    ';
    //$bdd = connexionPDO(); useless already done upper
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idAnimal',$_GET['idAnimal']); // on aurait pu faire $animal['id_animal']
    $stmt->execute();
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    //echo '<pre>';
    //print_r($caracteres);
?>

