<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\FornecedorbancoService;

class FornecedorbancoController extends Controller
{
   private $usuario;
   private $tabela = "fornecedorbanco"; // nome da tabela
   private $campo  = "id_fornecedorbanco"; // chave primária da tabela

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
      $dados['lista']      = FornecedorbancoService::fornecedorbancoprojeto();
      $dados['view']       = 'Fornecedorbanco/Index';
      $dados['page']       = 'Fornecedor';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados['fornecedor']    = FornecedorbancoService::ordenarfornecedor();
      $dados["view"]          = "Fornecedorbanco/Create";
      $dados['page']          = 'Fornecedor';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $fornecedorbanco = Service::get($this->tabela, $this->campo, $id);
      $fornecedor = Service::lista('fornecedor'); // Lista todos fornecedores

      if (!$fornecedorbanco) {
         $this->redirect(URL_BASE . "fornecedorbanco");
      }

      $dados["fornecedorbanco"]   = $fornecedorbanco;
      $dados['fornecedor']       = $fornecedor;
      $dados["view"]      = "Fornecedorbanco/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->status == 'S' ? $ativar->status = 'N' : $ativar->status = 'S';

      FornecedorbancoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "fornecedorbanco");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $fornecedorbanco = new \stdClass();
      $fornecedorbanco->id_fornecedorbanco  = $_POST["id_fornecedorbanco"] ? $_POST["id_fornecedorbanco"] : NULL;
      $fornecedorbanco->id_fornecedor       = $_POST['id_fornecedor'];
      $fornecedorbanco->banco               = strtoupper($_POST['banco']);
      $fornecedorbanco->agencia             = strtoupper($_POST['agencia']);
      $fornecedorbanco->conta               = strtoupper($_POST['conta']);


      Flash::setForm($fornecedorbanco);
      if (FornecedorbancoService::salvar($fornecedorbanco, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "fornecedorbanco");
      } else {
         if (!$fornecedorbanco->id_fornecedorbanco) {
            $this->redirect(URL_BASE . "fornecedorbanco/create");
         } else {
            $this->redirect(URL_BASE . "fornecedorbanco/edit/" . $fornecedorbanco->id_fornecedorbanco);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "fornecedorbanco");
   }
}
