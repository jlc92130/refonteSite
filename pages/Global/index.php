<?php include('../Commons/header.php'); ?>
<?php echo styleTitreNiveau1('Ils ont besoin de vous',COLOR_ASSO ) ?>
<div id="carouselExampleIndicators" class="carousel slide perso_bgGreen" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
  </ol>
  <div class="carousel-inner">
    <!-- DEBUT ITEM -->
    <div class="carousel-item active">
      <div class='row nogutters border rounded overflow-hidden mb-4'>  
        <div class='col-12 col-md-auto text-center'>
          <img src="../../src/img/Animaux/Chat/Odin/Odin.jpg" style="height:250px;" alt="photo de Odin">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="perso_ColorRoseMenu perso_textShadow">Odin</h3>
          <div class="text-muted mb-1">02/2020</div>
          <p class="mb-auto perso_size12">
            Description de Odin ...
          </p>
          <a href="./animal.php" class="btn btn-primary">Visiter ma page</a>
        </div>
      </div>
    </div>
    <!-- FIN ITEM -->
    <!-- DEBUT ITEM -->
        <div class="carousel-item">
      <div class='row no-gutters border rounded overflow-hidden mb-4'>  
        <div class='col-12 col-md-auto text-center'>
          <img src="../../src/img/Animaux/Chat/Sam/Sam.jpg" style="height:250px;" alt="photo de Sam">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="perso_ColorVertMenu perso_textShadow">Sam</h3>
          <div class="text-muted mb-1">01/2020</div>
          <p class="mb-auto perso_size12">
            Description de Sam....
          </p>
          <a href="" class="btn btn-primary">Visiter ma page</a>
        </div>
      </div>
    </div>
    <!-- FIN ITEM -->
  </div>
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
    <?php $txt = "<img src='../../src/img/Autres/icones/journal.png' alt='logo News'/>Nouvelles des adoptés";
      echo  styleTitreNiveau2($txt,COLOR_ACTUS ); ?>
  </div>
  <div class='col-6 mt-3'>  
    <?php $txt = "<img src='../../src/img/Autres/icones/journal.png' alt='logo News'/>Evénements & Actions";
      echo  styleTitreNiveau2($txt,COLOR_PENSIONNAIRE ); ?>
  </div>
</div>

<div class="row">
  <div class='col-6 mt-3'>
    <div class="row no-gutters border perso_bgGreen rounded mb-4">
      <div class='col-auto d-none d-lg-block'>
        <img src="../../src/img/Animaux/Chat/Odin/Odin.jpg" style="height:150px;" alt="photo de Odin">
      </div>
      <div class="col p-3 d-flex flex-column position-static">
        <h3 class="mb-0 perso_ColorRoseMenu">Doyen Odin</h3>
        <p>Un petit coucou de Odin en famille d'accueil </p>
        <a href="./animal.php" class="btn btn-primary">Visiter ma page</a>
      </div>
    </div>
  </div>
  <div class='col-6 mt-3'>
    <div class="row no-gutters perso_bgGreen border rounded mb-4">
      <div class="col-auto d-none d-lg-block" >
       <img src="../../src/img/Animaux/Chat/Sam/Sam.jpg" style="height:150px;" alt="photo de Sam">
      </div>
      <div class="col p-3 d-flex flex-column position-static" >
      <h3 class="mb-0 perso_ColorVertMenu">Notre nouvelle</h3>
        <p>Je suis nouvelle et en attente de trouver un refuge </p>
        <a href="" class="btn btn-primary">Visiter ma page</a>
      </div>
      
    </div>
  </div>

</div>


<?php include('../Commons/footer.php'); ?>