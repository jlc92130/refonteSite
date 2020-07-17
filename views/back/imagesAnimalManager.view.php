<?=   styleTitreNiveau3("Gestion des images" , COLOR_PENSIONNAIRE); ?> 

<div id="imageOfAnimal">
<?php foreach($data['animal']['images'] as $image) { ?>
    <img src="public/src/img/sites/<?= $image['url_image'] ?>" alt="<?= $image['libelle_image'] ?>" style="max-width:100px;" id='<?= $image['id_image'] ?>' />

<?php } ?>
</div>