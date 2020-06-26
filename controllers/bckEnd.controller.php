<?php
require_once  "public/utile/formatage.php";
require_once "config/config.php";
require_once "models/admin.dao.php";


function getPageLogin() {
   $title = "Page de login";
   $description = "Page de login";
   $alert1 = "";
   $alert2 = "";

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
         exit();
      }
      else {
         $alert1 = 'Mot de passe invalide';
      }
   } 
   else {
      $alert2 = 'Tous les champs doivent être saisis';
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

function getPageNewsAdmin() {
   if ( Securite::verificationAcces()) {
      $title = "Page de gestion des news";
      $description = "Page de gestion des news";
      Securite::genererCookie();
      require_once "views/back/adminNews.view.php";
   }
 
}

