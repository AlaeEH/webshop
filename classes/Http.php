<?php

Class Http
{
    // we gaan alles bepalen qua path en webroot en whatever
    public static $webroot = '';


    public static function boot()
    {           
        // hiermee maken we een nieuwe path aan
        if($_SERVER['HTTP_HOST'] == 'localhost' && strpos($_SERVER['REQUEST_URI'], '/public/')) {
            $urlParts = explode('/public/', $_SERVER['REQUEST_URI']);

            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'].$urlParts[0].'/public/';
        }
        else {
            self::$webroot = self::httpOrHttps().$_SERVER['HTTP_HOST'];
        }
    }

    // hier roepen we webroot aan
    public static function webroot()
    {
        return self::$webroot;
    }

    // hier vragen we of HTTPS is of HTTP is
    private static function httpOrHttps()
    {
        if(isset($_SERVER['HTTPS'])) {
            return 'https://';
        }
        return 'http://';
    }

}