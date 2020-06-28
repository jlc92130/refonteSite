<?php
ob_start();
echo styleTitreNiveau1("Page de gestion des news" , COLOR_PENSIONNAIRE);
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
                <?php foreach ($typeActualites as $type) { ?>
                    <option value="<?= $type['id_type_actualite'] ?>"><?= $type['libelle_type'] ?></option>
                <?php } ?>
                
            </select>
        </div>
    </div>


    <div class="form-row ">
        <label for="contenuActu">Contenu de l'actualité:</label>
        <textarea class="form-control" id="contenuActu" name="contenuActu" row="5" required></textarea>
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
$content = ob_get_clean();
require "views/commons/template.php" 
?> 




