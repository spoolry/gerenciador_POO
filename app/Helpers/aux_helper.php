<?php


if (!function_exists('debug')) {
    function debug($param)
    {
        echo "<pre>";
        print_r($param);
        exit;
    }
}

if (!function_exists('br2bd')) {
    function br2bd($date)
    {
        return implode('/', array_reverse(explode('-', $date)));
    }
}

if (!function_exists('bd2br')) {
    function bd2br($date)
    {
        return implode('-', array_reverse(explode('/', $date)));
    }
}

if (!function_exists('retirarCaracteresEspeciais')) {
    function retirarCaracteresEspeciais($string)
    {
        return preg_replace('/[^A-Za-z0-9\s]/', '', $string);
    }
}

if (!function_exists('timestamp2br')) {
    function timestamp2br($timestamp)
    {
        return date('d/m/Y H:i', strtotime($timestamp));
    }
}
