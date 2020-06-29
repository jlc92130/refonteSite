<?php

function ajoutImage($file, $dir, $nom) {
    if(!file_exists($dir))  mkdir($dir,0777);

    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    //path destination file
    $target_file = $dir.$nom."_".$file['name'];

    if(!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    if($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg" )
        throw new Exception("L'extension du fichier n'est pas reconnue");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déja");
    if($file['size'] > 500000)
        throw new Exception("La taille est trop grande");
// verify if the file transfer work
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("L'ajout de l'image n'a pas fonctionnée");
}