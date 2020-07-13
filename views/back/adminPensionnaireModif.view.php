<?php
ob_start();
echo styleTitreNiveau2("Modification d'un pensionnaire" , COLOR_PENSIONNAIRE);
echo styleTitreNiveau3("Choix:", COLOR_PENSIONNAIRE);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2">
    <label for="statutAnimal" name="statutAnimal">Statut</label>
    <select name="statutAnimal" id="statutAnimal" class="form-control" onchange = "submit()">
        <option ></option>
        <?php foreach ($statuts as $statut) { ?>
        <option value="<?= $statut['id_statut'] ?>" 
        <?php if(isset($_POST['statutAnimal']) && $_POST['statutAnimal'] === $statut['id_statut']) echo "selected" ?> 
        > 
            <?= $statut['libelle_statut'] ?>
        </option>  
        <?php } ?>
    </select>
</form>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2) { ?>
<form action="" method="POST" enctype="multipart/form-data" onchange = "submit()">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>" >
    <label for="typeAnimal" name="typeAnimal">Type animal:</label>
    <select name="typeAnimal" id="typeAnimal" class="form-control">
        <option ></option>
        <option value="chat" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === 'chat')   echo "selected" ?> >Chats</option>
        <option value="chien" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === 'chien') echo "selected" ?>>Chiens</option>
    </select>
    <?php } ?> 
</form>


    <?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=3) { ?>
<form action="" method="POST" enctype="multipart/form-data" onchange = "submit()">
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>" >
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>" >
    <label for="animal" name="animal">Animal</label>
    <select name="animal" id="animal" class="form-control">
        <option ></option>
        <?php foreach($data['animaux'] as $animal) { ?>
        <option value="<?= $animal['id_animal'] ?>" <?php if(isset($_POST['animal']) && $_POST['animal'] === $animal['id_animal']) echo "selected" ?> >
            <?= $animal['nom_animal'] ?>
        </option>
        <?php } ?>
    </select>
    <?php } ?> 
</form>

<br /><br />

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=4) { ?>
<form action="" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="etape" value="5">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>" >
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>" >
    <input type="hidden" name="animal" value="<?= $_POST['animal'] ?>" >
       
    <?=   styleTitreNiveau3("Modification de l'animal" , COLOR_PENSIONNAIRE); ?> 
         
    <div class="row mt-2">
        <div class="form-group row no-gutters  col-4">
            <label for="nom" class="col-12 col-md-auto pr-2">Nom: </label>
            <input type="text" class="col form-control" name="nom" value="<?=$data['animal']['nom_animal'] ?>" id="nom" required>
        </div>
        <div class="form-group row no-gutters col-4">
            <label for="puce" class="col-12 col-md-auto pr-2">Puce: </label>
            <input type="text" class="col form-control" value="<?=$data['animal']['puce'] ?>" name="puce" id="puce">
        </div>
        <div class="form-group row no-gutters col-4">
            <label for="dateN" class="col-12 col-md-auto pr-2" >Né: </label>
            <input type="date" class="col form-control" name="dateN" id="dateN" value="<?=$data['animal']['date_naissance_animal'] ?>">
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Type</th>
                <th>Sexe</th>
                <th>Statut</th>
                <th>Ami Chien</th>
                <th>Ami Chat</th>
                <th>Ami Enfant</th>
            </tr>
        </thead>
        
        <tbody>
            <tr class="text-center">
                <td>
                    <select name="type">
                        <option value="chat" <?php if($data['animal']['type_animal']==='chat') echo 'selected' ?> >Chat</option>
                        <option value="chien" <?php if($data['animal']['type_animal']==='chien') echo 'selected' ?> >Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="1" <?php if((int) $data['animal']['sexe']===1) echo 'selected' ?>>Male</option>
                        <option value="0" <?php if((int) $data['animal']['sexe']===0) echo 'selected' ?>>Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                    <?php    foreach($statuts as $statut) { ?>
                    <option value="<?= $statut['id_statut'] ?>" <?php if((int) $data['animal']['id_statut']===(int) $statut['id_statut']) echo 'selected' ?> >
                    <?= $statut['libelle_statut']  ?></option>
                    <?php } ?>
                        
                    </select>
                </td>
                <td>
                    <select name="amiChien">
                        <option value="Oui" <?php if((int) $data['animal']['ami_chien']==='oui') echo 'selected' ?> >Oui</option>
                        <option value="Non" <?php if((int) $data['animal']['ami_chien']==='non') echo 'selected' ?> >Non</option>
                        <option value="N/A" <?php if((int) $data['animal']['ami_chien']==='N/A') echo 'selected' ?> >N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiChat">
                        <option value="Oui" <?php if((int) $data['animal']['ami_chat']==='oui') echo 'selected' ?> >Oui</option>
                        <option value="Non" <?php if((int) $data['animal']['ami_chat']==='non') echo 'selected' ?>>Non</option>
                        <option value="N/A" <?php if((int) $data['animal']['ami_chat']==='N/A') echo 'selected' ?>>N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiEnfant">
                        <option value="Oui" <?php if((int) $data['animal']['ami_enfant']==='oui') echo 'selected' ?>>Oui</option>
                        <option value="Non" <?php if((int) $data['animal']['ami_enfant']==='non') echo 'selected' ?>>Non</option>
                        <option value="N/A" <?php if((int) $data['animal']['ami_enfant']==='N/A') echo 'selected' ?>>N/A</option>
                    </select>
                </td>
            </tr>        
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Caractère1</th>
                <th>Caractère2</th>
                <th>Caractère3</th>
            </tr>
        </thead>

        <tbody>
            <tr class="text-center">
                <td>
                    <select name="caractere1">
                    <?php foreach($caracteres as $caractere) { ?>
                        <option value="<?= $caractere['id_caractere'] ?>" <?php if($data['animal']['caractere1']['id_caractere'] === $caractere['id_caractere']) echo 'selected' ?> >
                        <?= $caractere['libelle_caractere_m']  ?>
                        </option>
                    <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="caractere2">
                    <?php foreach($caracteres as $caractere) { ?>
                        <option value="<?= $caractere['id_caractere'] ?>" <?php if(isset($data['animal']['caractere2']) && $data['animal']['caractere2']['id_caractere'] === $caractere['id_caractere']) echo 'selected' ?> >
                        <?= $caractere['libelle_caractere_m']  ?>
                        </option>
                    <?php } ?>
                </td>
                <td>
                    <select name="caractere3">
                    <?php foreach($caracteres as $caractere) { ?>
                        <option value="<?= $caractere['id_caractere'] ?>" <?php if(isset($data['animal']['caractere3']) && $data['animal']['caractere3']['id_caractere'] === $caractere['id_caractere']) echo 'selected' ?> >
                        <?= $caractere['libelle_caractere_m']  ?>
                        </option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>                    

    <div class="form-group ">
        <label for="description"> <?= $data['animal']['description_animal'] ?> </label>
        <textarea class="form-control" id="description" name="description" row="5"></textarea>
    </div>
    <div class="form-group ">
        <label for="adoptionDesc"> <?= $data['animal']['adoption_description_animal'] ?> </label>
        <textarea class="form-control" id="adoptionDesc" name="adoptionDesc" row="5"></textarea>
    </div>
    <div class="form-group ">
        <label for="localisation"> <?= $data['animal']['localisation_description_animal'] ?> </label>
        <textarea class="form-control" id="localisation" name="localisation" row="5"></textarea>
    </div>
    <div class="form-group ">
        <label for="engagement"> <?= $data['animal']['engagement_description_animal'] ?> </label>
        <textarea class="form-control" id="engagement" name="engagement" row="5"></textarea>
    </div>
    <div class="form-group mt-5">
        <label for="imageActu">Image :</label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>

    <div>
        <button class="btn btn-primary">Valider</button>
    </div>

</form>
<?php } ?> 

<?php
$contentAdminAction = ob_get_clean(); 
?> 




