<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\FornecedorService;

class FornecedorController extends Controller
{
   private $usuario;
   private $tabela = "fornecedor"; // nome da tabela
   private $campo  = "id_fornecedor"; // chave primária da tabela

   // MÉTODO RESPONSÁVEL POR VALIDAR SE O USUÁRIO ESTÁ LOGADO
   public function __construct()
   {
      $this->usuario = UtilService::getUsuario();
      if (!$this->usuario) {
         $this->redirect(URL_BASE . "login");
         exit;
      }
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA INDEX DA PASTA FORNECEDOR
   public function index()
   {
      $dados['lista']      = Service::lista($this->tabela);
      $dados['view']       = 'Fornecedor/Index';
      $dados['page']       = 'Fornecedor';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA FORNECEDOR
   public function create()
   {
      $dados["fornecedor"] = Flash::getForm();
      $dados["view"]       = "Fornecedor/Create";
      $dados['page']       = 'Fornecedor';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO FORNECEDOR E ENVIAR PARA A VIEW
   public function edit($id_fornecedor)
   {
      $fornecedor = Service::get($this->tabela, $this->campo, $id_fornecedor);
      if (!$fornecedor) {
         $this->redirect(URL_BASE . "fornecedor");
      }

      $dados["fornecedor"]   = $fornecedor;
      $dados["view"]      = "Fornecedor/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O FORNECEDOR
   public function ativar($cnpj)
   {
      $ativar = Service::get($this->tabela, $this->campo, $cnpj);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      FornecedorService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "fornecedor");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM FORNECEDOR
   public function salvar()
   {
      $fornecedor = new \stdClass();
      $fornecedor->id_fornecedor       = $_POST['id_fornecedor'] ? $_POST['id_fornecedor'] : NULL;
      $fornecedor->cnpj                = preg_replace('/[^0-9]/', '', $_POST["cnpj"]);
      $fornecedor->razao               = strtoupper($_POST['razao']);
      $fornecedor->fantasia            = strtoupper($_POST['fantasia']);
      $fornecedor->ie                  = preg_replace('/[^0-9]/', '', $_POST["ie"]);
      $fornecedor->endereco            = strtoupper($_POST['endereco']);
      $fornecedor->numero              = strtoupper($_POST['numero']);
      $fornecedor->bairro              = strtoupper($_POST['bairro']);
      $fornecedor->cidade              = strtoupper($_POST['cidade']);
      $fornecedor->cep                 = preg_replace('/[^0-9]/', '', $_POST["cep"]);
      $fornecedor->uf                  = strtoupper($_POST['uf']);
      $fornecedor->tipo                = strtoupper($_POST['tipo']);
      $fornecedor->cadastro_usuario    = $this->usuario->id_usuario;

      $_FILES['arquivo']['name'] ? $fornecedor->logo = $_FILES['arquivo'] : NULL;

      Flash::setForm($fornecedor);
      FornecedorService::salvar($fornecedor, $this->campo, $this->tabela);
      $this->redirect(URL_BASE . "fornecedor");
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM FORNECEDOR
   public function excluir($id_fornecedor)
   {
      Service::excluir($this->tabela, $this->campo, $id_fornecedor);
      $this->redirect(URL_BASE . "fornecedor");
   }
}
