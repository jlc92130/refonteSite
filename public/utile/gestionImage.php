<?php

function ajoutImage($file, $dir, $nom) {
    if(!file_exists($dir))  mkdir($dir,0777);

    if (isset($_POST['submit']))
    $extension='';
    // $file['name'] is the same than  $file->getFilename()
    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
   
    //path of the image directory
     $target_file = $dir.$nom.'_'.$file['name'];;

    if (!empty($file["tmp_name"])) {
        if(!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    }
    else {
        throw new Exception("Vous devez uploader une image");
    }
    //if($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg" )
      //  throw new Exception("L'extension du fichier n'est pas reconnue");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déja");
    if($file['size'] > 500000)
        throw new Exception("La taille est trop grande");
// verify if the file is moved from temporary folder to   destination folder(where we want the file to be)
    if(!move_uploaded_file($file['tmp_name'], $target_file)) {
        throw new Exception("L'ajout de l'image n'a pas fonctionnée");
    }
    else {
        //we will give this name to  the image, $file['name'] is the name of the uploaded file
        return ( $nom.'_'.$file['name']);
    }  
}