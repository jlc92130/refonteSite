<?php
ob_start();
echo styleTitreNiveau2("Modification d'une news" , COLOR_PENSIONNAIRE);
echo styleTitreNiveau2("Choix:", COLOR_PENSIONNAIRE);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2">
    <label for="typeActu" name="typeActu">Type d'actualité:</label>
    <select name="typeActu" id="typeActu" class="form-control" onchange = "submit()">
        <option ></option>
        <?php foreach ($typeActualites as $type) { ?>
        <option value="<?= $type['id_type_actualite'] ?>" 
        <?php if(isset($_POST['typeActu']) && $_POST['typeActu'] === $type['id_type_actualite']) echo "selected" ?> 
        > 
            <?= $type['libelle_type'] ?>
        </option>  
        <?php } ?>
    </select>
</form>

<?php if(isset($_POST['etape']) && (int) $_POST['etape']) { ?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>" >
    <label for="listeActu" name="listeActu">Actualite:</label>
    <select name="listeActu" id="listeActu" class="form-control" onchange="submit()">
            <option></option>
        <?php foreach ($data['actualite'] as $actualite) { ?>
            <option value="<?= $actualite['id_actualite'] ?>" 
            <?php if(isset($_POST['listeActu']) && $_POST['listeActu'] == $actualite['id_actualite']) echo "selected"   
            ?>
            >
                <?= $actualite['id_actualite']." - ".$actualite['libelle_actualite'] ?> 
            </option>
        <?php } ?>        
    </select>
    <?php } ?> 
</form>

<?php echo styleTitreNiveau2("La news à modifier:", COLOR_PENSIONNAIRE); ?>

<form action="" method="POST" enctype="multipart/form-data" onchange="submit()">
    <label  name="titreActu">Titre de l'actualité:</label>
    <input name="titreActu" value="<?php if(isset($_POST['etape']) && $_POST['etape']>=3) echo $data['actuChoisi'] ?>">
    <label for="titreAu" name="titre">Type d'actualité:</label>
    <select name="typeActu" id="typeActu" class="form-control">
    <?php   foreach ($actualites as $actualite) { ?>
        <option value="<?= $actualite['id_actualite'] ?>"><?= $actualite['libelle_actualite'] ?></option>
    <?php } ?>
        
    </select> 
</form>
<?php
$contentAdminAction = ob_get_clean(); 
?> 




