<?php

require_once "connect.php";

if(isset($_SESSION[SESSION_AUTH_ID])) {
    unset($_SESSION[SESSION_AUTH_ID]);
    unset($_SESSION[SESSION_AUTH_NAME]);
    unset($_SESSION[SESSION_AUTH_EMAIL]);
    unset($_SESSION[SESSION_IS_LOGIN_NAME]);
    header("Location: /");
} else {
    header("Location: /");
}