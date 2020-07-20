<?php
require_once "public/utile/gestionImage.php";
require_once  "public/utile/formatage.php";
require_once "config/config.php";
require_once "models/admin.dao.php";
require_once "models/image.dao.php";
require_once "models/actualites.requete.php";



function getPageLogin() {
   $title = "Page de login";
   $description = "Page de login";
   $alert = "";
   $alertType = "";

   // if session exist then we are redirected on page admin
   if (Securite::verificationAcces()) {
         header("Location: admin");
         exit();
      }

   if (isset($_POST["login"]) && !empty($_POST['login']) 
      && isset($_POST["password"]) && !empty($_POST['password']) ) 
   {
      $login_saisi    = Securite::secureHTML($_POST['login']);
      $password_saisi = Securite::secureHTML($_POST["password"]);
      
      if(connexionOK($login_saisi,$password_saisi)) {
         // we create a session named toto
         $_SESSION['acces'] = "toto";
         Securite::genererCookie();
         header("Location: admin");
         $alert = 'Vous êtes connecté';
         $alertType = ALERT_SUCCESS;
         exit();
      }
      else {
         $alert = 'L\'un des champs saisi est invalide';
         $alertType = ALERT_DANGER;
      
      }
   } 
   else {
      $alert = 'Tous les champs doivent être saisis';
      $alertType = ALERT_DANGER;
      
   }
   
   require_once "views/back/login.view.php";
}

function getPageAdmin() {
   if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true") {
      session_destroy();
      header("Location: accueil");
      exit();
   }

   if (Securite::verificationAcces()) {
      $title = "Page d'administration";
      $description = "Page d'administration";
      Securite::genererCookie();
      require_once "views/back/adminAccueil.view.php";
   }
   else {
      throw new Exception("Vous n'avez pas le droit d'accéder à cette page");   
   }
}

function getPagePensionnaireAdmin($require='', $alert='', $alertType='',$data='') {
   if ( Securite::verificationAcces()) {
      $title = "Page de gestion des pensionnaires";
      $description = "Page de gestion des pensionnaires";
      Securite::genererCookie();

      $statuts    = getStatutsAnimal();
      $caracteres = getListeCaracteresAnimal();


      $contentAdminAction = "";
      if ($require !=="") require_once $require;
      require_once "views/back/adminPensionnaire.view.php";
   }
   else {
      throw new Exception("Vous n'avez pas le droit d'acceder à cette page");
   }
}

function getPagePensionnaireAdminAjout() {
   $alertType = 0;
   $alert = '';
   //we verify the field that are mandatory in the dbb
   if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['dateN']) && !empty($_POST['dateN'])) {
      $nom     = Securite::secureHTML($_POST['nom']);
      $dateN   = Securite::secureHTML($_POST['dateN']);
      $puce    = Securite::secureHTML($_POST['puce']);
      $type    = Securite::secureHTML($_POST['type']);
      $sexe    = Securite::secureHTML($_POST['sexe']);
      $statut  = Securite::secureHTML($_POST['statut']);
      $amiChien = Securite::secureHTML($_POST['amiChien']);
      $amiChat = Securite::secureHTML($_POST['amiChat']);
      $amiEnfant = Securite::secureHTML($_POST['amiEnfant']);
      $description = Securite::secureHTML($_POST['description']);
      $adoptionDesc = Securite::secureHTML($_POST['adoptionDesc']);
      $localisation = Securite::secureHTML($_POST['localisation']);
      $engagement = Securite::secureHTML($_POST['engagement']);
      $fileImage = $_FILES['imageActu'];
      $caractere1 = Securite::secureHTML($_POST['caractere1']);
      $caractere2 = Securite::secureHTML($_POST['caractere2']);
      $caractere3 = Securite::secureHTML($_POST['caractere3']);
      

      // directory where i put the image
      $repertoire = "public/src/img/sites/animaux/".$type."/".strtolower($nom)."/";
      
      try {
         $nomImage = ajoutImage($fileImage,$repertoire,$nom);
         $idImage = insertImageIntoBD($nomImage,"animaux/".$type."/".strtolower($nom)."/".$nomImage);
         
         $idAnimal = insertAnimalIntoBD($nom,$dateN,$puce,$type,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description,
         $adoptionDesc,$localisation,$engagement);
         
         if ($idAnimal>0) {
            $alert = "La création de l'animal est effectuée";
            $alertType = ALERT_SUCCESS;
            insertIntoContient($idAnimal,$idImage);

            insertIntoDispose($caractere1,$idAnimal);
            if ($caractere1 != $caractere2) {
               insertIntoDispose($caractere2,$idAnimal);
            }
            if ($caractere3 != $caractere2 && $caractere3 != $caractere1) {
               insertIntoDispose($caractere3,$idAnimal);
            }
            

         }
         else {
            throw new Exception("L'insertion en BD n'a pas fonctionnée");
         }
      }
      catch (Exception $e) {
         $alert = "La création de l'animal n'a pas fonctionnée <br />".$e->getMessage();
         $alertType = ALERT_DANGER;
      }
   } 
  
   getPagePensionnaireAdmin("views/back/adminPensionnaireAjout.view.php", $alert, $alertType);
   
}


function getPagePensionnaireAdminModif() {
   $alertType = '';
   $alert = '';
   $data=array();


   if (isset($_POST['etape']) && (int)$_POST['etape'] >= 3) {
      $type = $_POST['typeAnimal'];
      $idStatut = Securite::secureHTML($_POST['statutAnimal']);
      $data['animaux'] = getAnimauxFromTypeAndStatut($type,$idStatut);
      
   }

   if (isset($_POST['etape']) && (int)$_POST['etape'] >=4) {
      
      $idAnimal = Securite::secureHTML($_POST['animal']);
      $data['animal'] = getAnimalFromIdAnimalBD((int)$idAnimal);
      $caracteres = getAnimalCaracteresBD($idAnimal);
      
      if (count($caracteres)>0) {
         $data['animal']['caract1'] = $caracteres[0];
        
      }
      if (count($caracteres)>1) {
         $data['animal']['caract2'] = $caracteres[1];
      }
      if (count($caracteres)>2) {
         $data['animal']['caract3'] = $caracteres[2];
      }
      $data['animal']['images'] = getImagesFromAnimal($idAnimal);
   }

   if (isset($_POST['etape']) && (int)$_POST['etape'] >=5) {
     
      $idAnimal = $data['animal']['id_animal'];
      $nom     = Securite::secureHTML($_POST['nom']);
      $dateN   = Securite::secureHTML($_POST['dateN']);
      $puce    = Securite::secureHTML($_POST['puce']);
      $typeSaisi    = Securite::secureHTML($_POST['type']);
      $sexe    = Securite::secureHTML($_POST['sexe']);
      $statut  = Securite::secureHTML($_POST['statut']);
      $amiChien = Securite::secureHTML($_POST['amiChien']);
      $amiChat = Securite::secureHTML($_POST['amiChat']);
      $amiEnfant = Securite::secureHTML($_POST['amiEnfant']);
      $description = Securite::secureHTML($_POST['description']);
      $adoptionDesc = Securite::secureHTML($_POST['adoptionDesc']);
      $localisation = Securite::secureHTML($_POST['localisation']);
      $engagement = Securite::secureHTML($_POST['engagement']);
      $caractere1 = Securite::secureHTML($_POST['caractere1']);
      $caractere2 = Securite::secureHTML($_POST['caractere2']);
      $caractere3 = Securite::secureHTML($_POST['caractere3']);
      $imageToDel = Securite::secureHTML($_POST['imgToDelete']);
       
      
      try {
         $idImageSplited = explode('-', $imageToDel);
         for ($i=0;$i<count($idImageSplited); $i++) {
            deleteImageFromAnimal($idImageSplited[$i],$idAnimal);
         }

         //$data['animal'] = getAnimalFromIdAnimalBD($idAnimal);
         if(updateAnimalIntoBD($idAnimal,$nom,$dateN,$puce,$typeSaisi,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description,$adoptionDesc,$localisation,$engagement)) {
            deleteCaracteresFromAnimalBD($idAnimal);
            insertIntoDispose($caractere1,$idAnimal);
            if ($caractere2 !== $caractere1) {
               insertIntoDispose($caractere2,$idAnimal);
            }
            if ($caractere3 !== $caractere1 && $caractere3 !== $caractere2) {
               insertIntoDispose($caractere3,$idAnimal);
            }

            //$caracteres = getAnimalCaracteresBD($idAnimal);
         
            
            
            $alert = "La modification de l'animal a été effectué";
            $alertType = ALERT_SUCCESS;

         }
         else {
            $alert = "La modification en base de donnée n'a pas eu lieu";
         }
        

      }
      catch (Exception $e) {
         $alert = "La modification de l'animal n'a pas fonctionnée <br />".$e->getMessage();
         $alertType = ALERT_DANGER;

      }
      $data['animal'] = getAnimalFromIdAnimalBD($idAnimal);
      $caracteres = getAnimalCaracteresBD($idAnimal);
      if (count($caracteres)>0) {
         $data['animal']['caract1'] = $caracteres[0];
      }
      if (count($caracteres)>1) {
         $data['animal']['caract2'] = $caracteres[1];
      }
      if (count($caracteres)>2) {
         $data['animal']['caract3'] = $caracteres[2];
      }
      $data['animal']['images'] = getImagesFromAnimal($idAnimal);

     
   }
   
   
   getPagePensionnaireAdmin("views/back/adminPensionnaireModif.view.php",$alert,$alertType,$data);
}

function getPagePensionnaireAdminSup() {
   $alert = "";
   $alertType = "";

   if(isset($_GET['sup']) && !empty($_GET['sup'])) {
      try {
         if(deleteAnimalFromBD(Securite::secureHTML($_GET['sup']))<1){
            throw new Exception ("La suppression n'a pas fonctionnée en BD");
         } ;
         $alert = "La suppression de l'animal a fonctionnée";
         $alertType = ALERT_SUCCESS;
      }
      catch (Exception $e) {
         $alert = "La suppression de l'animal n'a pas fonctionnée";
         $alertType = ALERT_DANGER;
      }
   }
   else {
      $alert = "Selectionner un animal";
   }
  
   getPagePensionnaireAdmin("views/back/adminPensionnaireModif.view.php",$alert,$alertType);

}


function getPageNewsAdmin($require='', $alert='', $alertType='',$data='') {
     
   if ( Securite::verificationAcces()) {
      $title = "Page de gestion des news";
      $description = "Page de gestion des news";
      Securite::genererCookie();
      $typeActualites = getTypesActualite();
      $contentAdminAction="";

      if ($require !== '') require_once $require;
      require_once "views/back/adminNews.view.php";
   }
   else {
      throw new Exception("Vous n'avez pas le droit d'accéder à cette page"); 
   }
 
}

function getPageNewsAdminAjout() {
   $alertType = '';
   $alert = '';
   if(isset($_POST['titreActu']) && !empty($_POST['titreActu']) && isset($_POST['typeActu']) && 
   !empty($_POST['typeActu']) && isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])) {
      $titreActu   = Securite::secureHTML($_POST['titreActu']);
      $typeActu    = Securite::secureHTML($_POST['typeActu']);
      $contenuActu = Securite::secureHTML($_POST['contenuActu']);
      $date = date("Y-m-d H:i:s", time());
      $fileImage = $_FILES['imageActu'];
      $repertoire = "public/src/img/sites/news/";
     
      try {
         // add image in the folder $repertoire (the function return the name of the image)
         // we give to our image the name $titreActu
         $nomImage = ajoutImage($fileImage, $repertoire,$titreActu);

         // we recover the id of the image we put in dbb
         $idImage = insertImageIntoBD($nomImage,"news/".$nomImage);
        

      if (insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$idImage)) {
         $alert = "La creation de l'actualite est effectuée"; 
         $alertType = ALERT_SUCCESS;
      }
      else {
         throw new Excpetion("L'insertion en BD n'a pas fonctionnée");
      }
      }
      catch (Exception $e) {
         $alert = "echec de l'insertion d'actualité : ". $e->getMessage();
         $alertType = ALERT_DANGER;
      }
   }
   getPageNewsAdmin("views/back/adminNewsAjout.view.php", $alert, $alertType);
   
}


function getPageNewsAdminModif() {
   $alertType = '';
   $alert = '';
   $data=array();
   
   if (isset($_POST['etape']) && (int) $_POST['etape'] >= 2) {
      // i get the value of the selection matching with the news type choose by the click of the mouse 
      $typeActu    = Securite::secureHTML($_POST['typeActu']);
      //$data['actualites']  = getActualiteFromBD((int) $typeActu);
      $data['actualite'] = getActualitesFromBD((int) $typeActu);
   }
   if (isset($_POST['etape']) && $_POST['etape'] >=3 ) {
      // we get the number associated to the id of the choosen news
      $actuChoisi = Securite::secureHTML($_POST['listeActu']);
      $data['actuChoisi'] = getActualiteFromBD($actuChoisi);
   }
   if (isset($_POST['etape']) && $_POST['etape'] >=4 ) {
      $titreActu   = Securite::secureHTML($_POST['titreActu']);
      $typeActu    = Securite::secureHTML($_POST['typeActu']);
      $contenuActu = Securite::secureHTML($_POST['contenuActu']);
      //id of the image's news selected
      $idImage = $data['actuChoisi']['id_image'];
      $idActualite = $data['actuChoisi']['id_actualite'];
      $nomImage = $data['actuChoisi']['libelle_image'];
      try {
         if ($_FILES['imageActu']['size'] > 0) {
            $fileImage = $_FILES['imageActu'];
            $repertoire = "public/src/img/sites/news/";
            $nomImage = ajoutImage($fileImage, $repertoire,$titreActu);
            // id of the uploaded image if we don't upload image then we will have the id of the current image
            $idImage = insertImageIntoBD($nomImage,"news/".$nomImage);
         }
      
         if (updateActualiteIntoBD($idActualite,$titreActu,$contenuActu,$typeActu,$idImage)) {
            $alert = "La modification de l'actualite est effectuée"; 
            $alertType = ALERT_SUCCESS;
         }
         else {
            throw new Exception("La modification en BD ne s'est pas faite");
         }
      }
      catch (Exception $e) {
         $alert = "La modification de l'actualité n'a pas fonctionnée : ". $e->getMessage();
         $alertType = ALERT_DANGER;
      }
      $data['actualite'] = getActualitesFromBD((int) $typeActu);
      $data['actuChoisi'] = getActualiteFromBD($actuChoisi);

   } 
   getPageNewsAdmin("views/back/adminNewsModif.view.php",$alert,$alertType,$data);
}

function getPageNewsAdminSup() {
   $alert = "";
   $alertType = "";
   if (isset($_GET['sup']) && !empty($_GET['sup'])) {
      try {
         $idActualite = securite::secureHTML($_GET['sup']);
                 
         supprimerActuFromBD($idActualite);
         $alert = "La suppression de l'actualité a fonctionné";
         $alertType = 'ALERT-SUCCESS';
        
   }
   catch (Exception $e) {
      $alert = "La suppression de l'actualité n'a pas fonctionnée : ";
      $alertType = ALERT_DANGER;
   }
   getPageNewsAdmin("");

}
}