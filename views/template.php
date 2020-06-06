

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $description ?>" >
    <title><?php echo $title ?></title>
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/design/css/default.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container p-0 mt-2 rounded perso_shadow" >
  <!-- HEADER -->
  <header class="bg-dark text-white rounded-top perso_policeTitre"> 
    <div class="row align-items-center m-0">
      <div class="col-2 p-2 text-center">
        <a href="../Global/index.php">
          <img src="public/src/img/Autres/logo_header.png" class="rounded-circle img-fluid perso_logoSize" alt="logo entete" />
        </a>
      </div>
      <div class="col-6 col-lg-8 m-0 p-0">
        <?php include('menu.php') ?>
      </div>
      <div class="col-2 text-right pt-1 pr-4 ">
        ALC 
      </div>
    </div>
  </header> 
<!--CONTENU DU SITE -->
<div class="border p-1 perso_minCorpSize px-5">


<? echo $content ?>


</div>
<!--FOOTER -->
<footer class="bg-dark text-center text-white rounded-bottom">
<p class='p-2'>&copy; Association Les Chatons 2020</p>
</footer>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../../bootstrap/js/bootstrap.js"></script>
</body>
</html>