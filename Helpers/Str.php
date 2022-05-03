<?php

class Str
{
    public static function limit($input, $numWord = 100)
    {
        $arrayWords = explode(" ", $input, $numWord);
        if(count($arrayWords) == $numWord) {
            $arrayWords[$numWord - 1] = "...";
        }
        return implode(" ", $arrayWords);
    }
}