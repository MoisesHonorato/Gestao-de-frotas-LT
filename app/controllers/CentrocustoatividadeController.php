<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\CentrocustoatividadeService;

class CentrocustoatividadeController extends Controller
{
   private $usuario;
   private $tabela = "centrocustoatividade"; // nome da tabela
   private $campo  = "id_cc_atividade"; // chave primária da tabela

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
      $dados['lista']   = CentrocustoatividadeService::centrocustoatividadeprojeto();
      $dados['view']    = 'Centrocustoatividade/Index';
      $dados['page']    = 'Centro de Custo';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      // Lista somente Centro de Custo se o projeto estiver ativo
      $dados['ccprojeto']      = CentrocustoatividadeService::ccprojeto();

      // Chama a view centrocustoatividade/Create
      $dados["view"] = "Centrocustoatividade/Create";
      $dados['page']    = 'Centro de Custo';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR A ATIVIDADE COM BASE NO ID E ENVIAR PARA VIEW
   public function edit($id)
   {
      $ccatividade = Service::get($this->tabela, $this->campo, $id);

      if (!$ccatividade) {
         $this->redirect(URL_BASE . "centrocustoatividade");
      }

      $dados['ccprojeto']     = CentrocustoatividadeService::ccprojeto();
      $dados["ccatividade"]   = $ccatividade;
      $dados["view"]      = "Centrocustoatividade/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      CentrocustoatividadeService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "centrocustoatividade");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $ccatividade = new \stdClass();
      $ccatividade->id_cc_atividade    = $_POST["id_cc_atividade"] ? $_POST["id_cc_atividade"] : NULL;
      $ccatividade->id_centrocusto     = $_POST['id_centrocusto'];
      $ccatividade->atividade          = strtoupper($_POST['atividade']);

      Flash::setForm($ccatividade);
      if (CentrocustoatividadeService::salvar($ccatividade, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "centrocustoatividade/create");
      } else {
         if (!$ccatividade->id_centrocustoatividade) {
            $this->redirect(URL_BASE . "centrocustoatividade/create");
         } else {
            $this->redirect(URL_BASE . "centrocustoatividade/edit/" . $ccatividade->id_cc_atividade);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "centrocustoatividade");
   }
}
