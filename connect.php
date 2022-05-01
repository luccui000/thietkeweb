<?php

session_start();

require_once "helpers.php";
require_once "config.php";

if(!function_exists('createConnection')) {
    function createConnection() {
        $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
        if($conn->connect_error) {
            die("Không thể kết nối đến CSDL");
        }
        mysqli_set_charset($conn, 'UTF8');
        return $conn;
    }
}
if(!function_exists('printError')) {
    function printError($message) {
        echo "<small class='text-danger'>" . $message . "</small>";
    }
}
if(!function_exists('escape_string')) {
    function escape_string($value): string
    {
        $return = '';
        for($i = 0; $i < strlen($value); ++$i) {
            $char = $value[$i];
            $ord = ord($char);
            if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
                $return .= $char;
            else
                $return .= '\\x' . dechex($ord);
        }
        return $return;
    }
}
if(isset($_GET['lang'])) {
    if(isset($_SESSION['lang']) && $_GET['lang'] === 'vi') {
        $_SESSION['lang'] = 'en';
    } else {
        $_SESSION['lang'] = 'vi';
    }
}

$slugUrl = trim($_SERVER['PHP_SELF'], '/');

if(substr($slugUrl, 0, 5) == 'admin') {
    // check session, if does not have session, it return the login page
    if(!isset($_SESSION[SESSION_AUTH_NAME]) && $slugUrl != 'admin/auth/login.php') {
        header("Location: /admin/auth/login.php");
    }
}