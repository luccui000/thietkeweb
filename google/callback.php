<?php
require_once "../connect.php";
require_once "../vendor/autoload.php";
require_once "../env.php";
require_once base_app("Classes/TaiKhoan.php");

$client = new Google_Client();
$client->setClientId(GOOGLE_APP_ID);
$client->setClientSecret(GOOGLE_APP_SECRET);
$client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
$client->addScope('email');
$client->addScope('profile');

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    $taikhoan = new TaiKhoan();
    $result = $taikhoan->where(['email' => $google_account_info->getEmail()]);
    if(count($result) == 0) {
        $isOk = $taikhoan->insert([
            'email' => $google_account_info->getEmail(),
            'ten_hien_thi' => $google_account_info->getName()
        ]);
        if($isOk) {
            $_SESSION[SESSION_AUTH_ID] = $taikhoan->id;
            $_SESSION[SESSION_AUTH_EMAIL] = $google_account_info->getEmail();
            $_SESSION[SESSION_AUTH_NAME] = $google_account_info->getName();
            $_SESSION[SESSION_IS_LOGIN_NAME] = true;
            header("Location: /");
        } else {
            echo "Có lỗi xảy ra";
        }
    } else {
        $_SESSION[SESSION_AUTH_ID] = $result[0]['id'];
        $_SESSION[SESSION_AUTH_EMAIL] = $result[0]['email'];
        $_SESSION[SESSION_AUTH_NAME] = $result[0]['ten_hien_thi'];
        $_SESSION[SESSION_IS_LOGIN_NAME] = true;
        header("Location: /");
    }
}