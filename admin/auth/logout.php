<?php
require_once '../../connect.php';

if(isset($_SESSION) && isset($_SESSION[SESSION_AUTH_NAME])) {
    unset($_SESSION[SESSION_AUTH_NAME]);
    unset($_SESSION[SESSION_IS_LOGIN_NAME]);
    header('Location: /admin/auth/login.php');
}