<?php
ob_start();
echo styleTitreNiveau2("Ajout d'une news" , COLOR_PENSIONNAIRE);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="titreActu">Titre de l'actualité : </label>
            <input type="text" class="form-control" name="titreActu" id="titreActu" required>
        </div>
        <div class="form-group col-6">
            <label for="typeActu">Type d'actualité : </label>
            <select name="typeActu" id="typeActu" class=form-control>
                <option value="news"></option>
                <?php foreach ($typeActualites as $type) { ?>
                    <option value="<?= $type['id_type_actualite'] ?>"><?= $type['libelle_type'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="form-row ">
        <label for="contenuActu">Contenu de l'actualité:</label>
        <textarea class="form-control" id="contenuActu" name="contenuActu" rows="5" required></textarea>
    </div>

    <div class="form-group mt-5">
        <label for="imageActu">Image :</label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>
    <div class="row no-gutters ">
        <input type="submit" value="Valider" class="btn btn-primary">
    </div>
    
</form>


<?php
$contentAdminAction = ob_get_clean(); 
?> 




