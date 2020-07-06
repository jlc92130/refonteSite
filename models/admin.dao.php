<?php


function getPasswordUser($id) {
   $bdd = connexionPDO();
   $req = 'SELECT * from administrateur where login = :login';
   $stmt = $bdd->prepare($req);
   $stmt->bindValue(":login",$id,PDO::PARAM_STR);
   $stmt->execute();
   $admin = $stmt->fetch();
   $stmt->closeCursor();
   return $admin;
}
function connexionOK($id,$pass) {
    $admin = getPasswordUser($id);
    $password = $admin['password'];
    
    // php function password_verify compare the two passwords and return true or false
    return password_verify($pass,$password);   
}
