<?php
require_once  "public/utile/formatage.php";
require_once 'models/animal.requete.php';
require_once "config/config.php";
require_once "models/actualites.requete.php";
require_once "models/admin.dao.php";


function getPageLogin() {
   $title = "Page de login";
   $description = "Page de login";
   $alert1 = "";
   $alert2 = "";

   if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {
      header("Location: admin");
      exit();
   }
   if (isset($_POST["login"]) && !empty($_POST['login']) && isset($_POST["password"]) && !empty($_POST['password']) ) {
      $login    = Securite::secureHTML($_POST['login']);
      $password = Securite::secureHTML($_POST["password"]);
      if(connexionOK($login,$password)) {
         $_SESSION['acces'] = "admin";
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

