<?php 

namespace Controller;
use \Core\Controller;
use Core\Request;
use Model\UserModel;

class UserController extends Controller {

    function __construct()
    {
        $this->req = new Request;
    }

    //REGISTER
    function addAction() {
        $this->render('register');
    }
 
    function registerAction() {
        $params = $this->req->verifyReq();
        $model = new UserModel($params);

        if(!$model->id) {
            $model->save();
            self::$_render = "Votre compte a ete cree." . PHP_EOL;
        }
    }
    // LOGIN
    function connectAction() {
        $this->render('login');
    }

    function loginAction() {
        $params = $this->req->verifyReq();
        $login = new UserModel($params);
        $login->getUser();
        $this->req->verifyReq();
        $this->render('show');
    }
    // OTHERS
    function showAction() {
        $this->render('show');
    }

    // function relationAction() {
    //     $params = $this->req->verifyReq();
    //     $obj = new ArticleModel($params);
    //     $result = $obj->tags();
    //     // $obj->read($result, 1);
    // }

    function avancerAction() {
        $this->getParams();
    }
}