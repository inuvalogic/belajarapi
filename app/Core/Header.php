<?php

namespace Api\Core;

class Header
{

    protected static $http_response_code;
    protected static $http_response_text;

    public static function init($code = NULL)
    {
        if ($code === NULL){
            $code = http_response_code();
        }

        switch ($code) {
            case 200: $text = 'OK'; break;
            case 400: $text = 'Bad Request'; break;
            case 403: $text = 'Forbidden'; break;
            case 404: $text = 'Not Found'; break;
            case 405: $text = 'Method Not Allowed'; break;
            case 501: $text = 'Not Implemented'; break;
            case 503: $text = 'Service Unavailable'; break;
            default:
                $text = 'Unknown http status code ' . $code;
                break;
        }

        header('HTTP/1.0 ' . $code . ' ' . $text);

        self::$http_response_code = $code;
        self::$http_response_text = $text;
    }

    public static function getStatusData()
    {
        $data = array(
            'code' => self::$http_response_code,
            'message' => self::$http_response_text,
        );
        
        return $data;
    }
}