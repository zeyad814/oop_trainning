<?php
class InputValidator {
    public static function checkRequest($method) {
        return $_SERVER['REQUEST_METHOD'] === $method;
    }

    public static function issetPost($input) {
        return isset($_POST[$input]);
    }

    public static function sanitizeInput($input) {
        return trim(htmlspecialchars(htmlentities($input)));
    }

    public static function requiredVal($input) {
        return !empty($input);
    }

    public static function minVal($input, $length) {
        return strlen($input) >= $length;
    }

    public static function maxVal($input, $length) {
        return strlen($input) <= $length;
    }

    public static function emailVal($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
?>