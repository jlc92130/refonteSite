<?php

function styleTitreNiveau1($text,$color ) {
    $txt = "<h1 class='text-center my-3 ".$color." perso_policeTitre perso_textShadow'>";
    $txt .= $text;
    $txt .= "</h1>";
    return $txt;

}
function styleTitreNiveau2($text,$color ) {
    $txt = "<h2 class='text-center mt-3 ".$color." perso_policeTitre perso_textShadow'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;

}
function styleTitreNiveau3($text,$color) {
   $txt = "<h3 class=' perso__textShadow ".$color."'>".$text."</h3>";
   return $txt;
}
function styleTitrePost($text) {
    $txt = "<h2 class='my-3 perso_size20 border-bottom border-dark'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;
    
}

function affichageCoupe100($str,$taille) {
    $desc='';

    if (strlen($str) > $taille/2) {
    if (strpos($str,'<br />', $taille/2) < $taille) {
        $desc = substr($str,0,strpos($str,'<br />',$taille/2));
    }
    else if (strpos($str,'.', $taille/2) < $taille) {
        $desc = substr($str,0,strpos($str,'.',$taille/2));
    }
    else if (strpos($str,'<br />',0) <= $taille/2 ) {
        $desc = substr($str,0,strpos($str,'<br />',0));
    }
    else if (strpos($str,'.',0) <= $taille/2 ) {
        $desc = substr($str,0,strpos($str,'.',$taille/2));
    }

    else {
        $desc = substr($str, strpos($str,'',0));
    }
    }
    else {
        $desc = $str;
    }
    return $desc."<b class='text-primary' >[...] </b>";
    
}
function afficherAlert($text,$type) {
    $alertType = "";
    if ($type === ALERT_SUCCESS) $alertType = "success";
    if ($type === ALERT_DANGER)  $alertType = "danger";
    if ($type === ALERT_INFO)    $alertType = "info";
    if ($type === ALERT_WARNING) $alertType = "warning";

    $txt = "<div class='alert alert-".$alertType." m-2'>";
    $txt .= $text;
    $txt .= "</div>";
    return $txt;
}