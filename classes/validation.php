<?php

class Validation {

    public static function length($required = 2, $string = "") {
        if (strlen($string) >= $required) {
            return $string;
        } else {
            return false;
        }
    }

    public static function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}
