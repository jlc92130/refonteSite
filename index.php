<?php

require_once "controllers/frtEnd.controller.php";

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        switch ($_GET['page']) {
                case "accueil": getPageAccueil();            
                break;
                case "pensionnaires": getPagePensionnaires();            
                break;
                case "association": getPageAssociation();            
                break;
                case "partenaires": getPagePartenaires();           
                break;
                case "contact": getPageContact();         
                break;
                case "don": getPageDon();           
                break;
                case "mentions": getPageMentions();            
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
                case "animal": getPageAnimal();           
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
