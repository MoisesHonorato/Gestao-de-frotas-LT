<?php

namespace app\controllers;

use app\core\Controller;
use app\util\UtilService;
use app\models\service\Service;
use app\models\service\ContratogeralService;

class ContratogeralController extends Controller
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
      $contratogeral  = ContratogeralService::contratogeral();

      $dados['lista'] = $contratogeral;
      $dados['view']  = 'Contratogeral/Index';
      $dados['page']  = 'Contrato';
      $this->load('template', $dados);
   }

   // MÉTODO RESPONSÁVEL POR MOSTRAR A PÁGINA CREATE DA PASTA CONTRATO
   public function ver($id)
   {
      $getcontratogeral    = ContratogeralService::getcontratogeral($id);
      $getdadosbancarios   = ContratogeralService::getdadosbancarios($id);
      $getcontato          = ContratogeralService::getcontato($id);
      $getobjeto           = ContratogeralService::getobjeto($id);

      if (!$getcontratogeral) {
         $this->redirect(URL_BASE . "contratogeral");
      }

      $dados["getcontrato"]      = $getcontratogeral;
      $dados['dadosbancarios']   = $getdadosbancarios;
      $dados['getcontato']  = $getcontato;
      $dados['getobjeto']        = $getobjeto;
      $dados["view"]             = "Contratogeral/Ver";
      $dados['page']             = 'Contrato';
      $this->load("template", $dados);
   }

   // MÉTODO RESPONSÁVEL POR ATIVAR / DESATIVAR O CONTRATO
   public function ativar($id)
   {
      $ativar = Service::get($this->tabela, $this->campo, $id);
      $ativar->contratostatus == '1' ? $ativar->contratostatus = '0' : $ativar->contratostatus = '1';

      // ContratogeralService::salvar($ativar, $this->campo, $this->tabela);

      $this->redirect(URL_BASE . "contratogeral");
   }
}
