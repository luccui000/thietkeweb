<?php

function url($suburl) {
     return BASE_URL . trim($suburl, '/');
}
function base_app($directory) {
    return BASE_APP . trim($directory, '/');
}