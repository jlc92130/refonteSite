<?php

class Securite {
    public static function secureHTML($string) {
        return htmlspecialchars($string);
    }
}