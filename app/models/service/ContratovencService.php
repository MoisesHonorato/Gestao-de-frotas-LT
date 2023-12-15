<?php

namespace app\models\service;

use app\models\validacao\ContratovencValidacao;
use app\models\dao\ContratovencDao;

class ContratovencService
{
    //MÉTODO RESPONSÁVEL POR SALVAR UM CONTRATO NO BANCO DE DADOS
    public static function salvar($contratovenc, $campo, $tabela)
    {
        // Validações
        $validacao = ContratovencValidacao::salvar($contratovenc);
        
        return Service::salvar($contratovenc, $campo, $validacao->listaErros(), $tabela);
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public static function contratovencgeral()
    {
        $dao = new ContratovencDao();
        return $dao->contratovencgeral();
    }

     // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
     public static function contratovenc()
     {
         $dao = new ContratovencDao();
         return $dao->contratovenc();
     }

    // LISTA TODOS PROJETO ATIVOS
    public static function projetoativo()
    {
        $dao = new ContratovencDao();
        return $dao->projetoativo();
    }

    // LISTA TODOS FORNECEDORES POR ORDEM ALFABÉTICA
    public static function fornecedores(){
        $dao = new ContratovencDao();
        return $dao->fornecedores();
    }
}
