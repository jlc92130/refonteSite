<?php
require_once "public/utile/gestionImage.php";
require_once  "public/utile/formatage.php";
require_once "config/config.php";
require_once "models/admin.dao.php";
require_once "models/actualites.requete.php";

function getPageLogin() {
   $title = "Page de login";
   $description = "Page de login";
   $alert = "";
   $alertType = "";

   // if session exist then we are redirected on page admin
   if (Securite::verificationAcces() && Securite::verificationCookie()) {
         header("Location: admin");
         exit();
      }

   if (isset($_POST["login"]) && !empty($_POST['login']) && isset($_POST["password"]) && !empty($_POST['password']) ) {
      $login_saisi    = Securite::secureHTML($_POST['login']);
      $password_saisi = Securite::secureHTML($_POST["password"]);
      
      if(connexionOK($login_saisi,$password_saisi)) {
         $_SESSION['acces'] = "admin";
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

function getPagePensionnaireAdmin() {
   if ( Securite::verificationAcces()) {
      $title = "Page de gestion des pensionnaires";
      $description = "Page de gestion des pensionnaires";
      Securite::genererCookie();
      require_once "views/back/adminPensionnaire.view.php";
   }
   
}

function getPageNewsAdmin($require='', $alert='', $alertType='') {
     
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
         $idImage = insertImageNewsIntoBD($nomImage,"news/".$nomImage);
        

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

   getPageNewsAdmin("views/back/adminNewsModif.view.php");
}
function getPageNewsAdminSup() {
   getPageNewsAdmin("views/back/adminNewsSup.view.php");
}
