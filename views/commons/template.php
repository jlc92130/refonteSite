

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $description ?>" >
    <title><?php echo $title ?></title>
    <link href="<?= URL?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= URL?>public/design/css/default.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<div class="container p-0 mt-2 rounded perso_shadow" >
  <!-- HEADER -->
  <header class="bg-dark text-white rounded-top perso_policeTitre"> 
    <div class="row align-items-center m-0">
      <div class="col-2 p-2 text-center">
        <a href="<?= URL?>accueil">
          <img src="<?= URL?>public/src/img/Autres/logo_header.png" class="rounded-circle img-fluid perso_logoSize" alt="logo entete" />
        </a>
      </div>
      <div class="col-6 col-lg-8 m-0 p-0">
        <?php include('views/commons/menu.php') ?>
      </div>
      <div class="col-2 text-right pt-1 pr-4 ">
        ALC 
      </div>
    </div>
  </header> 
<!--CONTENU DU SITE -->
<div class="border p-1 perso_minCorpSize px-5">


<?php echo $content ?>


</div>
<!--FOOTER -->
<footer class="bg-dark text-center text-white rounded-bottom">
<p class='p-2'>&copy; Association Les Chatons 2020</p>
</footer>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?= URL?>public/bootstrap/js/bootstrap.js"></script>
</body>
</html>