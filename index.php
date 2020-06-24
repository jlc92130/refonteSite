<?php
//start session
session_start();
require_once "controllers/bckEnd.controller.php";
require_once "controllers/frtEnd.controller.php";
require_once "config/Securite.class.php";

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = Securite::secureHTML($_GET['page']);
        switch ($_GET['page']) {
                case "login": getPageLogin();
                break;
                case "accueil": getPageAccueil();            
                break;
                case "pensionnaires": getPagePensionnaires();            
                break;
                case "association": getPageAssociation();            
                break;
                case "partenaires": getPagePartenaires();           
                break;
                case "actus": getPageActus();
                break;
                case "temperatures": getPageTemperatures();            
                break;
                case "chocolat": getPageChocolat();           
                break;
                case "plantes": getPagePlantes();         
                break;
                case "sterilisation": getPageSterilisation();           
                break;
                case "educateur": getPageEducateur();         
                break;
                case "contact": getPageContact();         
                break;
                case "don": getPageDon();           
                break;
                case "mentions": getPageMentions();            
                break;
                case "animal": getPageAnimal();           
                break;
                case "error301": 
                case "error302": 
                case "error400": 
                case "error401": 
                case "error402": 
                case "error403": 
                case "error405": 
                case "error500": 
                case "error505": throw new Exception(" Erreur de type: ".$_GET['page']);
                break;
                case "error403": throw new Exception(" Interdiction d'acces");
                break;
                case "error404": 
                break;
                default: throw new Exception("La page n'existe pas");
        } 
        
    } 
    else {
       getPageAccueil();
    }
    }
catch (Exception $e) {
    $title = "Error";
    $description = "Page de gestion des erreurs";
    $errorMessage = $e->getMessage();
   
    require "views/commons/erreur.view.php";
}
