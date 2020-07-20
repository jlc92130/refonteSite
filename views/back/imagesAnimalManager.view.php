<?=   styleTitreNiveau3("Gestion des images" , COLOR_PENSIONNAIRE); ?> 

<div id="imageOfAnimal">
   
    <?php foreach($data['animal']['images'] as $image) { ?>
        <img src="public/src/img/sites/<?= $image['url_image'] ?>" alt="<?= $image['libelle_image'] ?>" style="max-width:100px;" id='<?= $image['id_image'] ?>' />
    <?php  } ?>
    <input type="hidden" id="imgToDelete" name="imgToDelete" />   
</div>
<hr />
<div class="form-group">
    <label for="nbImage">Nombre d'images à rajouter</label>
    <input type="number" name="nbImage" id="nbImage" />
    <div id="imageToAdd"></div>
</div>

<script src="public/js/imageManagerAnimal.js"></script>