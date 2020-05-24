<?php include('../../utile/formatage.php'); ?>
<?php include('../../utile/config.php'); ?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../../design/css/default.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="container p-0 mt-2 rounded perso_shadow" >
  <!-- HEADER -->
  <header class="bg-dark text-white rounded-top perso_policeTitre"> 
    <div class="row align-items-center m-0">
      <div class="col-2 p-2 text-center">
        <a href="../Global/index.php">
          <img src="../../src/img/Autres/logo_header.png" class="rounded-circle img-fluid perso_logoSize" alt="logo entete" />
        </a>
      </div>
      <div class="col-6 col-lg-8 m-0 p-0">
        <?php include('../Commons/menu.php') ?>
      </div>
      <div class="col-2 text-right pt-1 pr-4 ">
        Les chatons 
      </div>
    </div>
  </header> 
<!--CONTENU DU SITE -->
<div class="border p-1 perso_minCorpSize px-5">