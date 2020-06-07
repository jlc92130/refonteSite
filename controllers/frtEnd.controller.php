<?php
require_once  "public/utile/formatage.php";
require_once 'models/animal.requete.php';
require_once "config/config.php";

function getPensionnaires() {
   
   $title = "Page des pensionnaires";
   $description = "C'est la page des pensionnaires";

   $_GET['idStatut'] = 2;
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
   require_once "views/front/pensionnaire.V.php";

}

function getAccueil() {
   $description = "Page d'accueil";
   $title = "Page d'accueil";
   require_once "views/front/accueil.view.php";
   
}

function getAssociation() {
   $description = "L'association";
   $title = "Page de l'association";
   require_once "views/front/asso/association.view.php";
   
}
function getPartenaires() {
   $description = "Page partenaires";
   $title = "Page des partenaires";
   require_once "views/front/asso/partenaires.view.php";
   
}
function getContact() {
   $description = "Page des contacts";
   $title = "Page des contacts";
   require_once "views/front/contact/contact.view.php";
   
}
function getDon() {
   $description = "Page des dons";
   $title = "Page des dons";
   require_once "views/front/contact/don.view.php";
   
}
function getMentions() {
   $description = "Page des mentions";
   $title = "Page des mentions";
   require_once "views/front/contact/mentions.view.php";
   
}
function getTemperatures() {
   $description = "Page des temperatures";
   $title = "Page des temperatures";
   require_once "views/front/articles/temperatures.view.php";
   
}
function getChocolat() {
   $description = "Page du chocolat";
   $title = "Page du chocolat";
   require_once "views/front/articles/chocolat.view.php";
   
}
function getPlantes() {
   $description = "Page des plantes";
   $title = "Page des plantes";
   require_once "views/front/articles/plantes.view.php";
   
}
function getSterilisation() {
   $description = "Page sterelisation";
   $title = "Page des sterelisations";
   require_once "views/front/articles/sterilisation.view.php";
   
}
function getEducateur() {
   $description = "Page educateur";
   $title = "Page des educateurs";
   require_once "views/front/articles/educateur.view.php";
   
}