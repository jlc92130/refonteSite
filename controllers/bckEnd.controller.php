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
   if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {
      if ($_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]) {
         $ticket = session_id().microtime().rand(0.999);
         $ticket = hash("sha512", $ticket);
         setcookie(COOKIE_PROTECT,$ticket,time()+ (60 * 20),'/',null,false,true);
         $_SESSION[COOKIE_PROTECT] = $ticket;
         header("Location: admin");
         exit();
      }
      else {
         session_destroy();
         throw new Exception("Vous n'avez pas le droit d'être là");
      }

   }
   if (isset($_POST["login"]) && !empty($_POST['login']) && isset($_POST["password"]) && !empty($_POST['password']) ) {
      $login_saisi    = Securite::secureHTML($_POST['login']);
      $password_saisi = Securite::secureHTML($_POST["password"]);
      
      if(connexionOK($login_saisi,$password_saisi)) {
         $_SESSION['acces'] = "admin";
         $ticket = session_id().microtime().rand(0.999);
         $ticket = hash("sha512", $ticket);
         setcookie(COOKIE_PROTECT,$ticket,time()+ (60 *20) ,'/',null,false,true);
         $_SESSION[COOKIE_PROTECT] = $ticket;
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
   $title = "Page d'administration";
   $description = "Page d'administration";

   require_once "views/back/adminAccueil.view.php";
}
