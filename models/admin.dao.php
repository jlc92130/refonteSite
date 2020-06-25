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
    
    // password_verify verify the password create by password_hash function
    return password_verify($pass,$password);
            
   
}
