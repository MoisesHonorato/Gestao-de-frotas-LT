<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\FornecedorcontatoService;

class FornecedorcontatoController extends Controller
{
   private $usuario;
   private $tabela = "fornecedorcontato"; // nome da tabela
   private $campo  = "id_fornecedorcontato"; // chave primária da tabela

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
      $dados['lista']      = FornecedorcontatoService::fornecedorcontatoprojeto();
      $dados['view']       = 'Fornecedorcontato/Index';
      $dados['page']       = 'Fornecedor';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados['fornecedor']    = FornecedorcontatoService::ordenarfornecedor();
      $dados["view"]          = "Fornecedorcontato/Create";
      $dados['page']          = 'Fornecedor';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $fornecedorcontato = Service::get($this->tabela, $this->campo, $id);
      $fornecedor = Service::lista('fornecedor'); // Lista todos fornecedores

      if (!$fornecedorcontato) {
         $this->redirect(URL_BASE . "fornecedorcontato");
      }

      $dados["fornecedorcontato"]   = $fornecedorcontato;
      $dados['fornecedor']       = $fornecedor;
      $dados["view"]      = "Fornecedorcontato/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->status == 'S' ? $ativar->status = 'N' : $ativar->status = 'S';

      FornecedorcontatoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "fornecedorcontato");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $fornecedorcontato = new \stdClass();
      $fornecedorcontato->id_fornecedorcontato  = $_POST["id_fornecedorcontato"] ? $_POST["id_fornecedorcontato"] : NULL;
      $fornecedorcontato->id_fornecedor         = $_POST['id_fornecedor'];
      $fornecedorcontato->telefone              = $_POST['telefone'];
      $fornecedorcontato->email                 = $_POST['email'];
      $fornecedorcontato->responsavel           = strtoupper($_POST['responsavel']);


      Flash::setForm($fornecedorcontato);
      if (FornecedorcontatoService::salvar($fornecedorcontato, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "fornecedorcontato");
      } else {
         if (!$fornecedorcontato->id_fornecedorcontato) {
            $this->redirect(URL_BASE . "fornecedorcontato/create");
         } else {
            $this->redirect(URL_BASE . "fornecedorcontato/edit/" . $fornecedorcontato->id_fornecedorcontato);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "fornecedorcontato");
   }
}
