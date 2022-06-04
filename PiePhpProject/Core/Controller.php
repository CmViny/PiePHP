<?php 

namespace Core;

class Controller extends Core{
    protected static $_render;
    // Function render est appelez dans les différents Controller (extend Controller ; $this->render) (seulement les Controller)
    // Elle prend une $view en parametre (show.php,...) et affiche cet view dans le layout index.php
    // Elle a pour fonction de vérifier les chemins des Views (show.php, register.php,...) et de les includes 
    protected function render ( $view , $scope = []) {
        extract ( $scope ) ;
        $f = implode ( DIRECTORY_SEPARATOR , [ dirname ( __DIR__ ) , 'src', 'View',
        str_replace('Controller', '', basename ( get_class ( $this ) ) ) , $view ]) . '.php';
        // DIR = Directory actuel (PiePHP)/src/View/Class(UserController = User)/$view(param render = register).php = PiePHP/src/View/User/register.php
        // AppController = ($class = App) , ($view = index.php ; src/View/App/index.php)
        // str_replace('Controller ', '') = Enleve le Controller de AppController , UserController, ..., ajouter dans Core.php
        if ( file_exists ( $f ) ) {
            ob_start () ;
            include ( $f ) ;
            $view = ob_get_clean () ;
            ob_start () ;
            include ( implode ( DIRECTORY_SEPARATOR , [ dirname ( __DIR__ ) , 'src', 'View', 'index']) . '.php') ;
            self::$_render = ob_get_clean (); 
        }
    }
    public function __destruct()
    {
        echo self::$_render;
    }

    function getParams() {
        $ex = explode("/", $_SERVER["REQUEST_URI"]);
        $parametre = end($ex);
        return $parametre;
    }
}