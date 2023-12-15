<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ProjetoService;
use app\models\service\Service;
use app\util\UtilService;

class ProjetoController extends Controller
{
   private $usuario;
   private $tabela = "projeto"; // nome da tabela
   private $campo  = "id_projeto"; // chave primária da tabela

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
      $dados['lista']      = Service::lista($this->tabela);
      //i($dados['projeto']);
      $dados['view']       = 'Projeto/Index';
      $dados['page']       = 'Projeto';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $dados["projeto"]    = Flash::getForm();
      $dados["view"]       = "Projeto/Create";
      $dados['page']       = 'Projeto';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $projeto = Service::get($this->tabela, $this->campo, $id);
      if (!$projeto) {
         $this->redirect(URL_BASE . "projeto");
      }

      $dados["projeto"]   = $projeto;
      $dados["view"]      = "Projeto/Create";
      $dados['page']      = 'Projeto';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      ProjetoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "projeto");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $projeto = new \stdClass();
      $projeto->id_projeto        = $_POST["id_projeto"] ? $_POST["id_projeto"] : NULL;
      $projeto->projeto           = strtoupper($_POST['projeto']);
      $projeto->empreendimento    = strtoupper($_POST['empreendimento']);

      Flash::setForm($projeto);
      if (ProjetoService::salvar($projeto, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "projeto");
      } else {
         if (!$projeto->id_projeto) {
            $this->redirect(URL_BASE . "projeto/create");
         } else {
            $this->redirect(URL_BASE . "projeto/edit/" . $projeto->id_projeto);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "projeto");
   }
}
