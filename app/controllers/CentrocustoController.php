<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\CentrocustoService;

class CentrocustoController extends Controller
{
   private $usuario;
   private $tabela = "centrocusto"; // nome da tabela
   private $campo  = "id_centrocusto"; // chave primária da tabela

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
      $dados['lista']      = CentrocustoService::centrocustoprojeto();
      $dados['view']       = 'Centrocusto/Index';
      $dados['page']    = 'Centro de Custo';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados["centrocusto"]   = Flash::getForm();
      $dados['projetos']      = CentrocustoService::projetoativo(); // Lista todos projetos

      $dados["view"]       = "Centrocusto/Create";
      $dados['page']    = 'Centro de Custo';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $centrocusto = Service::get($this->tabela, $this->campo, $id);
      $projetos = Service::lista('projeto'); // Lista todos projetos

      if (!$centrocusto) {
         $this->redirect(URL_BASE . "centrocusto");
      }

      $dados["centrocusto"]   = $centrocusto;
      $dados['projeto']       = $projetos;
      $dados["view"]      = "Centrocusto/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      CentrocustoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "centrocusto");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $centrocusto = new \stdClass();
      $centrocusto->id_centrocusto  = $_POST["id_centrocusto"] ? $_POST["id_centrocusto"] : NULL;
      $centrocusto->id_projeto      = $_POST['id_projeto'];
      $centrocusto->centrocusto     = $_POST['centrocusto'];
      $centrocusto->descricao       = strtoupper($_POST['descricao']);

      i($centrocusto);

      Flash::setForm($centrocusto);
      if (CentrocustoService::salvar($centrocusto, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "centrocusto");
      } else {
         if (!$centrocusto->id_centrocusto) {
            $this->redirect(URL_BASE . "centrocusto/create");
         } else {
            $this->redirect(URL_BASE . "centrocusto/edit/" . $centrocusto->id_centrocusto);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "centrocusto");
   }
}
