<?php

require "../utils/helpers.php";

if(count($_POST) > 0) {
    if(isset($_POST) && isset($_POST['text'])) {
        echo translate(html_entity_decode($_POST['text']));
    } else {
        echo "Không tìm thấy trường text post data!";
    }
}
