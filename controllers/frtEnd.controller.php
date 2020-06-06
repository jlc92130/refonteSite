<?php


function getPensionnaire() {
   require_once  "public/utile/formatage.php";
   require_once 'models/animal.requete.php';
   require_once "config/config.php";

   $title = "Page des pensionnaires";
   $description = "C'est la page des pensionnaires";

   $_GET['idStatut'] = 1;
   $animaux = getAnimalFromStatut($_GET['idStatut']);

   if ( (int) $_GET['idStatut'] === 1) {
      echo styleTitreNiveau1( TITRE_ANIMAL_ATTENTE , COLOR_PENSIONNAIRE); 
   } elseif ( (int) $_GET['idStatut'] === 3) {
      echo styleTitreNiveau1( TITRE_ANIMAL_FALD , COLOR_PENSIONNAIRE); 
   } else {
      echo styleTitreNiveau1( TITRE_ANIMAL_ANCIEN , COLOR_PENSIONNAIRE);
   }

   foreach($animaux as $key=>$animal) { 
      $image = getFirstImage($animal['id_animal']);
      $animaux[$key]['image'] = $image;

      $caracteres = getAllCaracters($animal['id_animal']);
      $animaux[$key]['caracteres'] = $caracteres;
      
   }


   require_once "views/pensionnaire.V.php";

}


