<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ContratovigenciaService;

class ContratovigenciaController extends Controller
{
   private $usuario;
   private $tabela = "contratovigencia"; // nome da tabela
   private $campo  = "id_contratovigencia"; // chave primária da tabela

   // MÉTODO RESPONSÁVEL POR VALIDAR SE O USUÁRIO ESTÁ LOGADO
   public function __construct()
   {
      $this->usuario = UtilService::getUsuario();
      if (!$this->usuario) {
         $this->redirect(URL_BASE . "login");
         exit;
      }
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA INDEX DA PASTA PROJETO
   public function index()
   {
      $dados['lista']      = ContratovigenciaService::contratogeral();
      $dados['view']       = 'Contratovigencia/Index';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados['contratoativo'] = ContratovigenciaService::contratoativo();
      $dados["view"]          = "Contratovigencia/Create";
      $dados['page']          = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $contratovigencia = Service::get($this->tabela, $this->campo, $id);

      if (!$contratovigencia) {
         $this->redirect(URL_BASE . "contratovigencia");
      }

      $dados['contratoativo']       = ContratovigenciaService::contratoativo();
      $dados["contratovigencia"]    = $contratovigencia;
      $dados["view"]                = "Contratovigencia/Create";
      $dados['page']                = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      ContratovigenciaService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "contratovigencia");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $contratovigencia = new \stdClass();
      $contratovigencia->id_contratovigencia = $_POST["id_contratovigencia"] ? $_POST["id_contratovigencia"] : NULL;
      $contratovigencia->id_contrato         = $_POST['id_contrato'];
      $contratovigencia->vigencia            = strtoupper($_POST['vigencia']);
      $contratovigencia->aditivo             = strtoupper($_POST['aditivo']);

      Flash::setForm($contratovigencia);
      if (ContratovigenciaService::salvar($contratovigencia, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "contratovigencia/create");
      } else {
         if (!$contratovigencia->id_contratovigencia) {
            $this->redirect(URL_BASE . "contratovigencia");
         } else {
            $this->redirect(URL_BASE . "contratovigencia/edit/" . $contratovigencia->id_contratovigencia);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "contratovigencia");
   }
}
