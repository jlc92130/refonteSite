<?php

require_once "controllers/frtEnd.controller.php";
require_once "config/Securite.class.php";

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = Securite::secureHTML($_GET['page']);
        switch ($page) {
                case "accueil": getPageAccueil();            
                break;
                case "pensionnaires": getPagePensionnaires();            
                break;
                case "association": getPageAssociation();            
                break;
                case "partenaires": getPagePartenaires();           
                break;
                case "actus": getPageActu();
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
                case "error301": throw new Exception("Erreur 301");
                break;
                case "error302": throw new Exception("Erreur 302");
                break;
                case "error400": throw new Exception("Erreur 400");
                break;
                case "error401": throw new Exception("Erreur 401");
                break;
                case "error402": throw new Exception("Page erreur 402");
                break;
                case "error403": throw new Exception("Page erreur 403");
                break;
                case "error404": throw new Exception("Page erreur 404");
                break;
                case "error405": throw new Exception("Page erreur 405");
                break;
                case "error500": throw new Exception("Page erreur 500");
                break;
                default: throw new Exception("La page n'existe pas");
        } 
        
    } 
    else {
       getPageAccueil();
    }
    }
catch (Exception $e) {
    $errorMessage = $e->getMessage();
   
    require "views/commons/erreur.view.php";
}
