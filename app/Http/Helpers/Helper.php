<?php

namespace App\Http\Helpers;
use Request;
use DateTime;
use DateTimeZone;

class Helper
{
    public static function getTimeDiff($time1,$time2)
    {   
        return round((strtotime($time2) - strtotime($time1))/3600, 1);
    }

    public static function customEncryptionDecryption($string, $action = 'encrypt')
    {
        $secretKey = 'c7tpe291z';
        $secretVal = 'GfY7r512';
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretVal), 0, 16);

        if ($action == 'encrypt') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}