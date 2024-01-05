<?php

class ValidationUtils {
    public static function sanitizeString($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    public static function validateUsername($username) {
        return preg_match('/^[a-zA-Z0-9_]+$/', $username);
    }
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function validatePassword($password) {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/[0-9]/', $password);

        return strlen($password) >= 8 && $uppercase && $lowercase && $number;
    }
}
?>