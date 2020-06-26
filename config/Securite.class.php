<?php

class Securite {
    public static function secureHTML($string) {
        return htmlspecialchars($string);
    }
    public static function genererCookie() {
        $ticket = session_id().microtime().rand(0,999);
         $ticket = hash("sha512", $ticket);
         setcookie(COOKIE_PROTECT,$ticket,time()+ (60 * 5),'/',null,false,true);
         $_SESSION[COOKIE_PROTECT] = $ticket;
    }
    public static function verificationCookie() {
        if (isset($_COOKIE[COOKIE_PROTECT]) && $_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]) {
            Securite::genererCookie();
            return true;
         }
         else {
            session_destroy();
            throw new Exception("Vous n'avez pas le droit d'être là");
         }
    }
    public static function verificationAcces() {
        return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin");
    }
}