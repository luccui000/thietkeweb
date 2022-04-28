<?php

function url($suburl) {
     echo BASE_URL . trim($suburl, '/');
}
function image_url($url) {
    return BASE_URL . trim($url, '/');
}
function base_app($directory) {
    return BASE_APP . trim($directory, '/');
}