<?php

// Config for database
if(!defined('HOSTNAME'))
    define('HOSTNAME', 'sql6.freemysqlhosting.net');
if(!defined('USERNAME'))
    define('USERNAME', 'sql6483851');
if(!defined('PASSWORD'))
    define('PASSWORD', 'xUHqXNEgld');
if(!defined('DB_NAME'))
    define('DB_NAME', 'sql6483851');

// config base app
if(!defined('base_url'))
    define('BASE_URL','http://dulichtravinh.com/');
if(!defined('base_app'))
    define('BASE_APP', str_replace('\\','/',__DIR__).'/' );

// config common
if(!defined('PRELOADER_TIME'))
    define('PRELOADER_TIME', 200);
if(!defined('SESSION_AUTH_NAME'))
    define('SESSION_AUTH_NAME', 'TenDangNhap');
if(!defined('SESSION_IS_LOGIN_NAME'))
    define('SESSION_IS_LOGIN_NAME', 'is_login');


