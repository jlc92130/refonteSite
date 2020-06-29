<?php 
ob_start();
echo styleTitreNiveau1('Ils ont besoin de vous',COLOR_ASSO );

 ?>
<div id="carouselExampleIndicators" class="carousel slide perso_bgGreen" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($animaux); $i++) { ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?= ($i===0) ? 'active':'' ?> bg-dark"></li>
    <?php }  ?>

  </ol>
  
    <div class="carousel-inner">
    <!-- DEBUT ITEM -->
    <?php foreach( $animaux as $key=>$animal) {  ?>

      <div class="carousel-item <?= ($key === 0 ) ? 'active':'' ?> ">
        <div class='row nogutters border rounded overflow-hidden mb-4'>  
          <div class='col-12 col-md-auto text-center'>
            <img src="<?= URL?>public/src/img/sites/<?= $animal['image']['url_image']  ?>" style="height:250px;" alt="<?= $animal['nom_animal'] ?>">
          </div>
          <div class="col p-4 d-flex flex-column position-static">
            <h3 class="perso_ColorRoseMenu perso_textShadow"><?= $animal['nom_animal'] ?></h3>
            <div class="text-muted mb-1"><?= date("d/m,Y",strtotime($animal['date_naissance_animal'])) ?></div>
            <p class="mb-auto perso_size12">
              <?= affichageCoupe100(nl2br($animal['description_animal']),300); ?>
            </p>
            <a href="animal&idAnimal=<?= $animal['id_animal'] ?>" class="btn btn-primary">Visiter ma page</a>
          </div>
        </div>
      </div>
      <?php  } ?>
    </div>
  
    <!-- FIN ITEM -->
  
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class='row'>
  <div class='col-6 mt-3'>  
    <?php $txt = "<img src='".URL."public/src/img/autres/icones/journal.png' alt='logo News'/> Nouvelles des adoptés";
      echo  styleTitreNiveau2($txt,COLOR_ACTUS ); ?>
  </div>
  <div class='col-6 mt-3'>  
    <?php $txt = "<img src='".URL."public/src/img/autres/icones/action.png' alt='logo News'/> Evénements & Actions";
      echo  styleTitreNiveau2($txt,COLOR_PENSIONNAIRE ); ?>
  </div>
</div>

<div class="row">
  <div class='col-6 mt-3'>
    <div class="row no-gutters border perso_bgGreen rounded mb-4">
      <div class='col-auto d-none d-lg-block'>
        <img src="<?= URL?>public/src/img/sites/<?= $news['url_image'] ?>" style="height:150px;" alt='<?= $news['libelle_image'] ?>' />
      </div>
      <div class="col p-3 d-flex flex-column position-static">
        <h3 class="mb-0 perso_ColorRoseMenu"><?= $news['libelle_actualite'] ?></h3>
        <p><?= affichageCoupe100(nl2br($news['contenu_actualite']),300) ?> </p>
        <a href="<?= URL ?>actus&type=<?php echo $news["id_type_actualite"] ?>" class="btn btn-primary">Voir les news</a>
      </div>
    </div>
  </div>
  
  <div class='col-6 mt-3'>
    <div class="row no-gutters perso_bgGreen border rounded mb-4">
      <div class="col-auto d-none d-lg-block" >
       <img src="<?= URL?>public/src/img/autres/<?= $action['url_image'] ?>" style="height:150px;" alt='<?= $action['url_image'] ?>' >
      </div>
      <div class="col p-3 d-flex flex-column position-static" >
      <h3 class="mb-0 perso_ColorVertMenu"><?= $action['libelle_actualite'] ?></h3>
        <p> <?= affichageCoupe100(nl2br($action['contenu_actualite']),300) ?> </p>
        <a href="<?= URL ?>actus&type=<?php echo TYPE_ACTIONS ?>"  class="btn btn-primary m-2">Voir les actions</a>
        <a href="<?= URL ?>actus&type=<?php echo TYPE_EVENTS ?>"  class="btn btn-primary">Voir les evenements</a>

      </div>
      
    </div>
  </div>

</div>


<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>