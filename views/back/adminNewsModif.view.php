<?php
ob_start();
echo styleTitreNiveau2("Modification d'une news" , COLOR_PENSIONNAIRE);
echo styleTitreNiveau3("Choix:", COLOR_PENSIONNAIRE);
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
<form action="" method="POST" enctype="multipart/form-data" onchange = "submit()">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>" >
    <label for="listeActu" name="listeActu">Actualite:</label>
    <select name="listeActu" id="listeActu" class="form-control">
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

<br /><br />

<?php if(isset($_POST['etape']) && $_POST['etape']>=3) { ?>
<?php echo styleTitreNiveau3("La news à modifier:", COLOR_PENSIONNAIRE); ?>
<form action="" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>" >
    <input type="hidden" name="listeActu" value="<?= $_POST['listeActu'] ?>" >
    <div class="form-row">
        <div class="form-group col-6">
            <label  name="titreActu">Titre de l'actualité:</label>
            <input type="text" class="form-control" id="titreActu" name="titreActu" 
            value="<?= $data['actuChoisi']['libelle_actualite'] ?>">
        </div>
        <div class="form-group col-6">   
            <label for="typeActu" name="typeActu">Type d'actualité:</label>
            <select name="typeActu" id="typeActu" class="form-control">
                <option ></option>
            <?php foreach ($typeActualites as $type) { ?>
                <option value="<?= $type['id_type_actualite'] ?>" 
                    <?php if($data['actuChoisi']['id_type_actualite'] === $type['id_type_actualite']) 
                    echo "selected" ?> 
                > 
                    <?= $type['libelle_type'] ?>
                </option>  
            <?php } ?>           
            </select> 
        </div>
    </div>
    <div class="form-group col-12">
        <label for="contenuActu" name="contenuActu">Contenu de l'actualité</label>
        <textarea id="contenuActu" name="contenuActu" rows=5 class="form-control">
            <?= $data['actuChoisi']['contenu_actualite'] ?>
        </textarea>
    </div>
    <img style="max-width:200px;" src="public/src/img/sites/<?= $data['actuChoisi']['url_image'] ?>" alt="<?= $data['actuChoisi']['libelle_image'] ?>">
    <div class="form-group"> 
        <label for="imageActu" >Image:</label>
        <input type="file" name="imageActu" class="form-control" id="imageActu" >
    </div>
    <div class=" mt-2 no-gutters">
        <input type="submit" value="Valider" class='btn btn-primary btn-sm'>
    
        <button id="btnSup"   class='btn btn-danger btn-sm'>Supprimer</button>
    </div>

</form>
<?php } ?>

<script src="public/js/verificationSuppressionActualite.js"></script>

<?php
$contentAdminAction = ob_get_clean(); 
?> 




