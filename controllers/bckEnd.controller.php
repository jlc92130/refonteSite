<?php
require_once  "public/utile/formatage.php";
require_once 'models/animal.requete.php';
require_once "config/config.php";
require_once "models/actualites.requete.php";


function getPageLogin() {
   $title = "Page de login";
   $description = "Page de login";

   require_once "views/back/login.view.php";
}