<?php

// Config for database
if(!defined('HOSTNAME'))
    define('HOSTNAME', 'localhost');
if(!defined('USERNAME'))
    define('USERNAME', 'root');
if(!defined('PASSWORD'))
    define('PASSWORD', 'Pass@123');
if(!defined('DB_NAME'))
    define('DB_NAME', 'dulichtravinh');

// config base app
if(!defined('base_url'))
    define('BASE_URL','http://dulichtravinh.com/');
if(!defined('base_app'))
    define('BASE_APP', str_replace('\\','/',__DIR__).'/' );

// config common
if(!defined('PRELOADER_TIME'))
    define('PRELOADER_TIME', 200);
if(!defined('SESSION_AUTH_ID'))
    define('SESSION_AUTH_ID', 'id');
if(!defined('SESSION_AUTH_NAME'))
    define('SESSION_AUTH_NAME', 'ten_dang_nhap');
if(!defined('SESSION_AUTH_EMAIL'))
    define('SESSION_AUTH_EMAIL', 'email');
if(!defined('SESSION_IS_LOGIN_NAME'))
    define('SESSION_IS_LOGIN_NAME', 'is_login');


