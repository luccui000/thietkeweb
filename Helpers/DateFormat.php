<?php

class DateFormat
{
    public static function format($data, $format = 'd/m/Y')
    {
        return date($format, strtotime($data));
    }
}