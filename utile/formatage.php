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
function styleTitrePost($text,$date,$color) {
    $txt = "<h2 class='my-3 border-bottom border-dark perso_size20'>Posté le: <span class='perso_size20 ".$color."'>".$date."</span> par <span class='perso_size20 ".$color."'>".$text."</span></h2>";
    return $txt;
}
