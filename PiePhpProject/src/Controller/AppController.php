<?php 

namespace Controller;

use Core\Controller;
use Core\Request;

class AppController extends Controller {

    function __construct()
    {
        $req = new Request;
    }

    function indexAction() {
        echo "App Controller";
    }
}