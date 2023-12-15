<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\HomeService;

class HomeController extends Controller
{
   private $usuario;

   public function __construct()
   {
      $this->usuario = UtilService::getUsuario();

      if (!$this->usuario) {
         $this->redirect(URL_BASE . "Login");
         exit;
      }
   }

   public function index()
   {
      // Lista os 5 contratos que vão vencer
      $contratovenc  = HomeService::contratovenc();

      // Lista as 5 CNH que vão vencer
      $cnhvenc  = HomeService::cnhvenc();

      $dados['cnhvenc']    = $cnhvenc;
      // i($dados['cnhvenc']);
      $dados['cvenc']      = $contratovenc;
      $dados["view"]       = "home";
      $dados['page']       = 'Home';
      $this->load("template", $dados);
   }
}
