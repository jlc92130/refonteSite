<?php
ob_start();
echo styleTitreNiveau2("Modification d'une news" , COLOR_PENSIONNAIRE);
echo styleTitreNiveau2("Choix:");
?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="typeActu" name="typeActu">Type d'actualité:</label>
    <select name="typeActu" id="typeActu" class="form-control" onchange = "submit()">
        <option value="news"></option>
        <option value="news">News</option>
        <option value="action">Action</option>
        <option value="event">Evenement</option>
    </select>

    <label for="actualite:" name="type">Actualite:</label>
    <select name="typeActu" id="typeActu" class="form-control">
    <?php   foreach ($actualites as $actualite) { ?>
        <option value="<?= $actualite['libelle_actualite'] ?>"><?= $actualite['libelle_actualite'] ?></option>
    <?php } ?>
        
    </select>
    
</form>

<?php echo styleTitreNiveau2("La news à modifier:"); ?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="actualite:" name="type">Titre de l'actualité:</label>
    <input name="type" value="<?= $actualite['libelle_actualite'] ?>"></input>
    <label for="actualite:" name="type">Type d'actualité:</label>
    <select name="typeActu" id="typeActu" class="form-control">
    <?php   foreach ($actualites as $actualite) { ?>
        <option value="<?= $actualite['libelle_actualite'] ?>"><?= $actualite['libelle_actualite'] ?></option>
    <?php } ?>
        
    </select> 
</form>
<?php
$contentAdminAction = ob_get_clean(); 
?> 




