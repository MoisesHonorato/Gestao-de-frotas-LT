<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\CondutorService;

class CondutorController extends Controller
{
   private $usuario;
   private $tabela = "condutor"; // nome da tabela
   private $campo  = "id_mot_enc"; // chave primária da tabela


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
      $dados['lista']      = CondutorService::condutorgeral();
      $dados['view']       = 'Condutor/Index';
      $dados['page']       = 'Condutor';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $colaborador     = CondutorService::condutorativo(); // Lista todos colaboradores ativos
      if (!$colaborador) {
         $this->redirect(URL_BASE . "Condutor/Index");
      }

      $dados['condutor']      = $colaborador;
      $dados['encarregado']   = $colaborador;
      $dados["view"]          = "Condutor/Create";
      $dados['page']          = 'Condutor';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $motorista = Service::get($this->tabela, $this->campo, $id);
      $colaborador     = CondutorService::condutorativo(); // Lista todos colaboradores ativos

      if (!$motorista) {
         $this->redirect(URL_BASE . "condutor");
      }

      $dados["motorista"]     = $motorista;
      $dados['condutor']      = $colaborador;
      $dados['encarregado']   = $colaborador;
      $dados["view"]          = "Condutor/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      CondutorService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "condutor");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $condutor = new \stdClass();
      $condutor->id_mot_enc         = $_POST["id_mot_enc"] ? $_POST["id_mot_enc"] : NULL;
      $condutor->id_motorista       = $_POST['id_motorista'];
      $condutor->id_encarregado     = $_POST['id_encarregado'];
      $condutor->cnh                = preg_replace('/[^0-9]/', '', $_POST['cnh']);
      $condutor->cpf                = preg_replace('/[^0-9]/', '', $_POST['cpf']);
      $condutor->categoria          = strtoupper($_POST['categoria']);
      $condutor->emissao            = $_POST['emissao'];
      $condutor->vencimento         = $_POST['vencimento'];
      $condutor->observacao         = strtoupper($_POST['observacao']);

      Flash::setForm($condutor);

      if (CondutorService::salvar($condutor, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "condutor");
      } else {
         if (!$condutor->id_mot_enc) {
            $this->redirect(URL_BASE . "condutor/create");
         } else {
            $this->redirect(URL_BASE . "condutor/edit/" . $condutor->id_mot_enc);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "condutor");
   }
}
