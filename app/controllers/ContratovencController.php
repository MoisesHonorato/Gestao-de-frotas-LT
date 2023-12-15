<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ContratovencService;

class ContratovencController extends Controller
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
      $dados['lista'] = ContratovencService::contratovenc();

      $dados['view']  = 'Contratovenc/Index';
      $dados['page']  = 'Contrato';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA CONTRATO
   public function create()
   {
      $dados['fornecedor']       = ContratovencService::fornecedores();
      $dados['projetosativos']   = ContratovencService::projetoativo();
      $dados["view"]             = "Contratovenc/Create";
      $dados['page']             = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO CONTRATO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $contratovenc = Service::get($this->tabela, $this->campo, $id);
      if (!$contratovenc) {
         $this->redirect(URL_BASE . "contratovenc");
      }

      $dados["contratovenc"]         = $contratovenc;
      $dados['fornecedor']       = ContratovencService::fornecedores();
      $dados['projetosativos']   = ContratovencService::projetoativo();
      $dados["view"]             = "Contratovenc/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA CONTRATO
   public function ver($id)
   {
      $contratovenc = Service::get($this->tabela, $this->campo, $id);
      if (!$contratovenc) {
         $this->redirect(URL_BASE . "contratovenc");
      }

      $dados["contratovenc"]   = $contratovenc;
      $dados["view"]      = "Contratovenc/Ver";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O CONTRATO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->contratovencstatus == '1' ? $ativar->contratovencstatus = '0' : $ativar->contratovencstatus = '1';

      ContratovencService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "contratovenc");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM CONTRATO
   public function salvar()
   {
      $contratovenc = new \stdClass();
      $contratovenc->id_contratovenc         = $_POST['id_contratovenc'] ? $_POST['id_contratovenc'] : NULL;
      $contratovenc->id_projeto          = $this->usuario->id_projeto;
      $contratovenc->id_fornecedor       = $_POST["id_fornecedor"];
      $contratovenc->contratovenc            = strtoupper($_POST['contratovenc']);
      $contratovenc->datacontratovenc        = isset($_POST['datacontratovenc']) ? $_POST['datacontratovenc'] : "1900-01-01";
      $contratovenc->valormobilizacao    = strtoupper($_POST['valormobilizacao']);
      $contratovenc->valordesmobilizacao = strtoupper($_POST['valordesmobilizacao']);
      $contratovenc->maoobra             = strtoupper($_POST['maoobra']);

      Flash::setForm($contratovenc);
      ContratovencService::salvar($contratovenc, $this->campo, $this->tabela);
      $this->redirect(URL_BASE . "contratovenc");
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM CONTRATO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "contratovenc");
   }
}
