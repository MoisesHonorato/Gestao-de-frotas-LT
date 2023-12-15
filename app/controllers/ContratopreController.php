<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ContratopreService;

class ContratopreController extends Controller
{
   private $usuario;
   private $tabela = "contrato"; // nome da tabela
   private $campo  = "id_contrato"; // chave primária da tabela

   // MÉTODO RESPONSÁVEL POR VALIDAR SE O USUÁRIO ESTÁ LOGADO
   public function __construct()
   {
      $this->usuario = UtilService::getUsuario();
      if (!$this->usuario) {
         $this->redirect(URL_BASE . "login");
         exit;
      }
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA INDEX DA PASTA CONTRATO
   public function index()
   {
      // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
      $contratogeral  = ContratopreService::contratogeral();

      $dados['lista'] = $contratogeral;
      $dados['view']  = 'Contratopre/Index';
      $dados['page']  = 'Contrato';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA CONTRATO
   public function create()
   {
      $dados['fornecedor']       = ContratopreService::fornecedores();
      $dados['projetosativos']   = ContratopreService::projetoativo();
      $dados["view"]             = "Contratopre/Create";
      $dados['page']             = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO CONTRATO E ENVIAR PARA A VIEW
   public function edit($id_contrato)
   {
      $contratopre = Service::get($this->tabela, $this->campo, $id_contrato);
      if (!$contratopre) {
         $this->redirect(URL_BASE . "Contratopre/Index");
      }

      $dados["contrato"]         = $contratopre;
      $dados['fornecedor']       = ContratopreService::fornecedores();
      $dados['projetosativos']   = ContratopreService::projetoativo();
      $dados["view"]             = "Contratopre/create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA CONTRATO
   public function ver($id)
   {
      $contratopre = Service::get($this->tabela, $this->campo, $id);
      if (!$contratopre) {
         $this->redirect(URL_BASE . "contratopre");
      }

      $dados["contrato"]   = $contratopre;
      $dados["view"]      = "Contratopre/Ver";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O CONTRATO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->contratostatus == '1' ? $ativar->contratostatus = '0' : $ativar->contratostatus = '1';

      ContratopreService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "contratopre");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM CONTRATO
   public function salvar()
   {
      $contrato = new \stdClass();
      $contrato->id_contrato         = $_POST['id_contrato'] ? $_POST['id_contrato'] : NULL;
      $contrato->id_projeto          = $this->usuario->id_projeto;
      $contrato->id_fornecedor       = $_POST["id_fornecedor"];
      $contrato->contrato            = strtoupper($_POST['contrato']);
      $contrato->datacontrato        = isset($_POST['datacontrato']) ? $_POST['datacontrato'] : "1900-01-01";
      $contrato->valormobilizacao    = removerFormatacaoNumero($_POST["valormobilizacao"]);
      $contrato->valordesmobilizacao = removerFormatacaoNumero($_POST["valordesmobilizacao"]);
      $contrato->maoobra             = strtoupper($_POST['maoobra']);

      Flash::setForm($contrato);
      ContratopreService::salvar($contrato, $this->campo, $this->tabela);
      $this->redirect(URL_BASE . "contratopre");
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM CONTRATO
   public function excluir($id_contrato)
   {
      Service::excluir($this->tabela, $this->campo, $id_contrato);
      $this->redirect(URL_BASE . "contratopre");
   }
}
