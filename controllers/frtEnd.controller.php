<?php
require_once  "public/utile/formatage.php";
require_once 'models/animal.requete.php';
require_once "config/config.php";
require_once "models/actualites.requete.php";

function getPagePensionnaires() {
   
   $title = "Page des pensionnaires";
   $description = "C'est la page des pensionnaires";

   if(isset($_GET['idStatut']) && !empty($_GET['idStatut'])) {
      $idStat = Securite::secureHTML($_GET['idStatut']);
      $animaux = getAnimalFromStatut($idStat);

      if ( (int) $idStat === 1) {
         echo styleTitreNiveau1( TITRE_ANIMAL_ATTENTE , COLOR_PENSIONNAIRE); 
      } elseif ( (int) $idStat === 3) {
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
   else {
      throw new Exception ("L ID du statut n'est pas renseigné");
   }
  

}

function getPageAccueil() {
   $description = "Page d'accueil";
   $title = "Page d'accueil";
   require_once "views/front/accueil.view.php";
   
}

function getPageAssociation() {
   $description = "L'association";
   $title = "Page de l'association";
   require_once "views/front/asso/association.view.php";
   
}
function getPagePartenaires() {
   $description = "Page partenaires";
   $title = "Page des partenaires";
   require_once "views/front/asso/partenaires.view.php";
   
}
function getPageContact() {
   $description = "Page des contacts";
   $title = "Page des contacts";
   require_once "views/front/contact/contact.view.php";
   
}
function getPageDon() {
   $description = "Page des dons";
   $title = "Page des dons";
   require_once "views/front/contact/don.view.php";
   
}
function getPageMentions() {
   $description = "Page des mentions";
   $title = "Page des mentions";
   require_once "views/front/contact/mentions.view.php";
   
}
function getPageTemperatures() {
   $description = "Page des temperatures";
   $title = "Page des temperatures";
   require_once "views/front/articles/temperatures.view.php";
   
}
function getPageChocolat() {
   $description = "Page du chocolat";
   $title = "Page du chocolat";
   require_once "views/front/articles/chocolat.view.php";
   
}
function getPagePlantes() {
   $description = "Page des plantes";
   $title = "Page des plantes";
   require_once "views/front/articles/plantes.view.php";
   
}
function getPageSterilisation() {
   $description = "Page sterelisation";
   $title = "Page des sterelisations";
   require_once "views/front/articles/sterilisation.view.php";
   
}
function getPageEducateur() {
   $description = "Page educateur";
   $title = "Page des educateurs";
   require_once "views/front/articles/educateur.view.php";
   
}

function getPageActu() {
   $description = "Page d'actualité du site";
   $title = "Les actualites";

   $actualites = getActualiteFromBD();
   foreach($actualites as $key => $actualite) {
      $image = getImageActualiteFromBD($actualite['id_image']);
     
      //on rajoute un champs a l objet actualite
      $actualites[$key]["image"] = $image;
      
   }
   
   require_once "views/front/actu.view.php";
   
}

function getPageAnimal() {  
   if (isset($_GET['idAnimal']) && !empty($_GET['idAnimal'])) {
      $idAn = Securite::secureHTML($_GET['idAnimal']);
      $animal = getAnimalFromIdAnimalBD($idAn);
      $description = "Page de". $animal['nom_animal'];
      $title = "Page de". $animal['nom_animal'];
      $images = getImagesFromAnimal($idAn);
      $caracteres = getAllCaracters($idAn);
      require_once "views/front/animal.view.php";
   }
   else {
      throw new Exception ("L ID de l'animal n'est pas renseigné");
   }
   
    
}