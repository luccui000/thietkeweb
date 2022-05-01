<?php

class Translator
{
    public static function translate($text, $from = "vi", $to = "en")
    {
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl={$from}&tl={$to}&dt=t&q=" . urlencode($text);
        $res = file_get_contents($url);
        $res = json_decode($res);
        if (isset($res[0]))
            return $res[0][0][0];
        return '';
    }
}