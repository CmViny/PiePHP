<?php
namespace Core;

class Core
{
    public function run()
    {   
        require "src/routes.php";
        $router = new Router();

        $URI = $_SERVER["REQUEST_URI"];
        $URI = str_replace(BASE_URI,"",$URI);
        $routes = $router::getRoutes($URI);

        if($routes == null) {
            echo "Page not found\n ERROR 404";
            return true;
        }

        $ucController =  ucfirst($routes["controller"]);
        $ControllerUC = "Controller";

        $ucAction = "Action";
        $Action = $routes["action"].$ucAction;
        
        $obj = $ControllerUC."\\".$ucController.$ControllerUC; 
        $app = new $obj();

        $app->$Action();
    }
}
