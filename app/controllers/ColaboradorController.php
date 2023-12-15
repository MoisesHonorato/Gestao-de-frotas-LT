<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ColaboradorService;

class ColaboradorController extends Controller
{
   private $usuario;
   private $tabela = "colaborador"; // nome da tabela
   private $campo  = "id_colaborador"; // chave primária da tabela

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
      // Lista os todos os Colabores, Projetos e Funcões
      $dados['lista']      = ColaboradorService::colaboradorgeral();
      $dados['view']       = 'Colaborador/Index';
      $dados['page']    = 'Colaborador';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados['projeto']    = ColaboradorService::projetoativo(); // Lista todos projetos ativos
      $dados['funcao']     = ColaboradorService::funcao(); // Lista todas funções
      $dados["view"]       = "Colaborador/Create";
      $dados['page']    = 'Colaborador';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $colaborador = Service::get($this->tabela, $this->campo, $id);

      if (!$colaborador) {
         $this->redirect(URL_BASE . "colaborador");
      }

      $dados["colaborador"]   = $colaborador;
      $dados['projeto']       = ColaboradorService::projetoativo(); // Lista todos projetos ativos
      $dados['funcao']        = Service::lista('funcao');
      $dados["view"]          = "Colaborador/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->status == 'S' ? $ativar->status = 'N' : $ativar->status = 'S';

      ColaboradorService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "colaborador");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $colaborador = new \stdClass();
      $colaborador->id_colaborador  = $_POST["id_colaborador"] ? $_POST["id_colaborador"] : NULL;
      $colaborador->id_projeto      = $_POST['id_projeto'];
      $colaborador->id_funcao       = $_POST['id_funcao'];
      $colaborador->nome            = strtoupper($_POST['nome']);

      Flash::setForm($colaborador);
      if (ColaboradorService::salvar($colaborador, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "colaborador");
      } else {
         if (!$colaborador->id_colaborador) {
            $this->redirect(URL_BASE . "colaborador/create");
         } else {
            $this->redirect(URL_BASE . "colaborador/edit/" . $colaborador->id_colaborador);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "colaborador");
   }
}
