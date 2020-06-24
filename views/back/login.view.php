<?php
    ob_start();

    echo styleTitreNiveau1("Login" , COLOR_PENSIONNAIRE);
 ?>
 <div class="m-5">
    <form action="" method="POST">
        <div class="form-group row no-gutters align-items-center">
            <label for="login" class="col-6 col-md-3 col-lg-2">Login :</label>
            <input type="text" name="login" class="col-6 col-md-9 col-lg-10 form-control" id="login">
        </div>
        <div class="form-group row no-gutters align-items-center">
            <label for="password" class="col-6 col-md-3 col-lg-2">Password :</label>
            <input type="password" name="password" class="col-6 col-md-9 col-lg-10 form-control" id="password">
        </div>
        <div class="justify-content-center row no-gutters">
            <input type="submit" class="btn btn-primary" value="valider"></input>
        </div>
    </form>
 </div>

<?php if ($alert1 !== '') { ?>
    <div class='alert alert-danger'>
        <?= $alert1;  ?>
    </div>
<?php } ?>
<?php if ($alert2 !== '') { ?>
    <div class='alert alert-danger'>
        <?= $alert2;  ?>
    </div>
<?php } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php" 
?> 