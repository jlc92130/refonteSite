<?php
ob_start();
echo styleTitreNiveau2("Ajout d'un animal" , COLOR_PENSIONNAIRE);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group row no-gutters  col-4">
            <label for="nom" class="col-12 col-md-auto pr-2">Nom: </label>
            <input type="text" class="col form-control" name="nom" id="nom" required>
        </div>
        <div class="form-group row no-gutters col-4">
            <label for="puce" class="col-12 col-md-auto pr-2">Puce: </label>
            <input type="text" class="col form-control" name="puce" id="puce">
        </div>
        <div class="form-group row no-gutters col-4">
            <label for="dateN" class="col-12 col-md-auto pr-2" >Né: </label>
            <input type="date" class="col form-control" name="dateN" id="dateN" placeholder="jj/mm/aaaa">
        </div>
    </div>
    <table class="table">
        <thead>
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
            <tr>
                <td>
                    <select name="type">
                        <option value="chat">Chat</option>
                        <option value="chien">Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="1">Male</option>
                        <option value="0">Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                        <option value="1"></option>
                    </select>
                </td>
                <td>
                    <select name="amiChien">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiChat">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiEnfant">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
            </tr>
        
        </tbody>
    </table>
    <div class="form-group ">
        <label for="description">description</label>
        <textarea class="form-control" id="description" name="description" row="5"></textarea>
    </div>
    
</form>


<?php
$contentAdminAction = ob_get_clean(); 
?> 




