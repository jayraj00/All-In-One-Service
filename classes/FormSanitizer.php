<?php
class FormSanitizer {
    public static function snitizeFormString($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = strtolower($input);
        $input = ucfirst($input);
        return $input;
    }

    public static function snitizeFormUsername($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }

    public static function snitizeFormEmail($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }

    public static function snitizeFormPassword($input) {
        $input = strip_tags($input);
        return $input;
    }
}
?>