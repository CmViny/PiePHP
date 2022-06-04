<?php

namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        $URI = substr($_SERVER["REQUEST_URI"], 1);
        $URIS = explode("/", $URI);
        $ex = explode("/", $url);
        $regex = "^[\{\}]$^";
        $condition = preg_match($regex, $url);

        if ($URIS[1] == $ex[1] && $condition) {
            $parametre = end($ex);
            $result = end($URIS);          
            $route['param'] = $parametre;
            $route['param'] .= "=$result";
            $url = str_replace("PiePHP", "", $URI);
        }
        return self::$routes[$url] = $route;
    }


    public static function getRoutes($url)
    {
        return self::$routes[$url];
    }
}
