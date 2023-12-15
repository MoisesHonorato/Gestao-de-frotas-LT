<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ContratoobjetoService;

class ContratoobjetoController extends Controller
{
   private $usuario;
   private $tabela = "contratoobjeto"; // nome da tabela
   private $campo  = "id_contratoobjeto"; // chave primária da tabela

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
      $dados['lista']      = ContratoobjetoService::objetogeral();
      $dados['view']       = 'Contratoobjeto/Index';
      $dados['page']       = 'Contrato';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados['contratoativo'] = ContratoobjetoService::contratoativo();
      $dados['equipamento']   = ContratoobjetoService::lista(); //Service::lista('equipamento');
      $dados["view"]          = "Contratoobjeto/Create";
      $dados['page']          = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $contratoobjeto = Service::get($this->tabela, $this->campo, $id);

      if (!$contratoobjeto) {
         $this->redirect(URL_BASE . "contratoobjeto");
      }

      $dados['contratoativo']       = ContratoobjetoService::contratoativo();
      $dados["contratoobjeto"]      = $contratoobjeto;
      $dados['equipamento'] = Service::lista('equipamento');
      $dados["view"]                = "Contratoobjeto/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      ContratoobjetoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "contratoobjeto");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $contratoobjeto = new \stdClass();
      $contratoobjeto->id_contratoobjeto = $_POST["id_contratoobjeto"] ? $_POST["id_contratoobjeto"] : NULL;
      $contratoobjeto->id_contrato    = $_POST['id_contrato'];
      $contratoobjeto->id_equipamento = $_POST['id_equipamento'];
      $contratoobjeto->valor          = removerFormatacaoNumero($_POST["valor"]);
      $contratoobjeto->mobilizacao    = isset($_POST['mobilizacao']) ? $_POST['mobilizacao'] : "1900-01-01";
      $contratoobjeto->desmobilizacao = isset($_POST['desmobilizacao']) ? $_POST['desmobilizacao'] : "1900-01-01";
      $contratoobjeto->status         = $_POST['status'];

      Flash::setForm($contratoobjeto);
      if (ContratoobjetoService::salvar($contratoobjeto, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "contratoobjeto");
      } else {
         if (!$contratoobjeto->id_contratoobjeto) {
            $this->redirect(URL_BASE . "contratoobjeto/create");
         } else {
            $this->redirect(URL_BASE . "contratoobjeto/edit/" . $contratoobjeto->id_contratoobjeto);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "contratoobjeto");
   }
}
