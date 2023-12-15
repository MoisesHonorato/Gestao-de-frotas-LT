<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\EncarregadoService;

class EncarregadoController extends Controller
{
   private $usuario;
   private $tabela = "encarregado"; // nome da tabela
   private $campo  = "id_encarregado"; // chave primária da tabela

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
      $dados['lista']      = EncarregadoService::encarregadogeral();
      $dados['view']       = 'Encarregado/Index';
      $dados['page']       = 'Encarregado';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA PROJETO
   public function create()
   {
      $colaborador   = EncarregadoService::encarregadoativo(); // Lista todos colaboradores ativos 
      $atividade  = EncarregadoService::atividadesativas(); // Lista todas atividades

      $dados['colaborador']   = $colaborador;
      $dados['atividade']     = $atividade;
      $dados["view"]          = "Encarregado/Create";
      $dados['page']          = 'Encarregado';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR BUSCAR OS DADOS DO PROJETO E ENVIAR PARA A VIEW
   public function edit($id)
   {
      $encarregado   = Service::get($this->tabela, $this->campo, $id);
      $colaborador   = EncarregadoService::encarregadoativo(); // Lista todos colaboradores ativos
      $atividade     = EncarregadoService::atividadesativas(); // Lista todas atividades

      if (!$encarregado) {
         $this->redirect(URL_BASE . "encarregado");
      }

      $dados["encarregado"]   = $encarregado;
      $dados['colaborador']   = $colaborador;
      $dados['atividade']     = $atividade;
      $dados["view"]          = "Encarregado/Create";
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O PROJETO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->ativo == 'S' ? $ativar->ativo = 'N' : $ativar->ativo = 'S';

      EncarregadoService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "encarregado");
   }

   // MÉTODO RESPONSÁVEL POR CRIAR OU EDITAR UM PROJETO
   public function salvar()
   {
      $encarregado = new \stdClass();
      $encarregado->id_encarregado    = $_POST["id_encarregado"] ? $_POST["id_encarregado"] : NULL;
      $encarregado->id_colaborador    = $_POST['id_colaborador'];
      $encarregado->id_cc_atividade   = $_POST['id_cc_atividade'];

      Flash::setForm($encarregado);
      if (EncarregadoService::salvar($encarregado, $this->campo, $this->tabela)) {
         $this->redirect(URL_BASE . "encarregado");
      } else {
         if (!$encarregado->id_mot_enc) {
            $this->redirect(URL_BASE . "encarregado/create");
         } else {
            $this->redirect(URL_BASE . "encarregado/edit/" . $encarregado->id_mot_enc);
         }
      }
   }

   // MÉTODO RESPONSÁVEL POR EXCLUIR UM PROJETO
   public function excluir($id)
   {
      Service::excluir($this->tabela, $this->campo, $id);
      $this->redirect(URL_BASE . "encarregado");
   }
}
