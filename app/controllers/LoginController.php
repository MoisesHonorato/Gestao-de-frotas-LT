<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;

class LoginController extends Controller
{

    public function index()
    {
        $dados["view"] = "login";
        $dados['page'] = 'Login';
        $this->load("login", $dados);
    }
    public function logar()
    {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        Flash::setForm($_POST);
        if (Service::logar("email", $email, $senha, "usuario")) {
            $this->redirect(URL_BASE);
        } else {
            $this->redirect(URL_BASE . "login");
        }
    }

    public function logoff()
    {
        unset($_SESSION[SESSION_LOGIN]);
        $this->redirect(URL_BASE . "login");
    }
}
