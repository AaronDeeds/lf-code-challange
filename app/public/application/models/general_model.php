<?php

if(!defined('BASEPATH')) {
    http_response_code(404) && die();
}

class General_model extends CI_Model
{

    function split_by_word($string, $width)
    {
        $str = wordwrap($string, $width, "*..*");
        $str = explode("*..*",$str);
        return $str;
    }

    function format_phone($number)
    {
        //$blah = preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($number)), 2);
        $blah = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', str_replace('.', null, trim($number)));
        return $blah;
    }

    function abbreviate_string($string, $length, $dot = TRUE)
    {
        if (strlen($string) > $length) // if you want...
        {
            $string = substr($string, 0, $length);
            if($dot == TRUE)
                $string .= "...";
        }
        return $string;
    }

    function random_string($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    function random_number($n) {
        $characters = '123456789';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    function truncate($string)
    {
        $string_lenth = strlen($string);
        if($string_lenth === 0)
            return '';
        if($string_lenth === 1)
            return '*';
        if($string_lenth === 2)
            return '**';
        $length = 2;
        $star = str_repeat("*", $string_lenth - $length);
        if (strlen($string) > $length) {
            $string = $star . substr($string, -$length);
        }

        return $string;
    }

    function money($number, $decimal = True)
    {
        if ($decimal == True) {
            return number_format($number, 2, '.', ',');
        }else{
            return number_format($number, 0, '', ',');
        }

    }

}
