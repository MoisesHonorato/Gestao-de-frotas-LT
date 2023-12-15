<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\EquipamentoService;

class EquipamentoController extends Controller
{
   private $usuario;
   private $tabela = "equipamento"; // nome da tabela
   private $campo  = "id_equipamento"; // chave primária da tabela

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
      $dados['view']       = 'Equipamento/Index';
      $dados['page']       = 'Equipamento';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA FORNECEDOR
   public function ver($id)
   {
      $equipamento = Service::get($this->tabela, $this->campo, $id);
      if (!$equipamento) {
         $this->redirect(URL_BASE . "equipamento");
      }

      $dados["equipamento"]   = $equipamento;
      $dados["view"]          = "Equipamento/Ver";
      $dados['page']          = 'Equipamento';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA FORNECEDOR
   public function create()
   {
      $dados["equipamento"] = Flash::getForm();
      $dados["view"] = "Equipamento/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO FORNECEDOR E ENVIAR PARA A VIEW
   public function edit($id_equipamento)
   {
      $equipamento = Service::get($this->tabela, $this->campo, $id_equipamento);
      if (!$equipamento) {
         $this->redirect(URL_BASE . "equipamento");
      }

      $dados["equipamento"]   = $equipamento;
      $dados["view"]      = "Equipamento/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O FORNECEDOR
   public function ativar($cnpj)
   {
      $ativar = Service::get($this->tabela, $this->campo, $cnpj);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      EquipamentoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "equipamento");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM FORNECEDOR
   public function salvar()
   {
      $equipamento = new \stdClass();
      $equipamento->id_equipamento   = $_POST['id_equipamento'] ? $_POST['id_equipamento'] : NULL;
      $equipamento->placa            = strtoupper($_POST['placa']);
      $equipamento->marca            = strtoupper($_POST['marca']);
      $equipamento->modelo           = strtoupper($_POST['modelo']);
      $equipamento->chassi           = strtoupper($_POST['chassi']);
      $equipamento->renavan          = strtoupper($_POST['renavan']);
      $equipamento->anomodelo        = strtoupper($_POST['anomodelo']);
      $equipamento->tipocategoria    = strtoupper($_POST['tipocategoria']);
      $equipamento->proprietario     = strtoupper($_POST['proprietario']);
      $equipamento->cpf_cnpj         = preg_replace('/[^0-9]/', '', $_POST["cpf_cnpj"]);
      $equipamento->tipo_generico    = strtoupper($_POST['tipo_generico']);
      $equipamento->cadastro_usuario = $this->usuario->id_usuario;

      Flash::setForm($equipamento);
      EquipamentoService::salvar($equipamento, $this->campo, $this->tabela);
      $this->redirect(URL_BASE . "equipamento");
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM FORNECEDOR
   public function excluir($id_equipamento)
   {
      Service::excluir($this->tabela, $this->campo, $id_equipamento);
      $this->redirect(URL_BASE . "equipamento");
   }
}
