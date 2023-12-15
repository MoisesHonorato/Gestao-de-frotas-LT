<?php

namespace app\models\service;

use app\models\validacao\ContratopreValidacao;
use app\models\dao\ContratopreDao;

class ContratopreService
{
    //MÉTODO RESPONSÁVEL POR SALVAR UM CONTRATO NO BANCO DE DADOS
    public static function salvar($contrato, $campo, $tabela)
    {
        // Validações
        $validacao = ContratopreValidacao::salvar($contrato);

        return Service::salvar($contrato, $campo, $validacao->listaErros(), $tabela);
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public static function contratogeral()
    {
        $dao = new ContratopreDao();
        return $dao->contratogeral();
    }

    // LISTA TODOS PROJETO ATIVOS
    public static function projetoativo()
    {
        $dao = new ContratopreDao();
        return $dao->projetoativo();
    }

    // LISTA TODOS FORNECEDORES POR ORDEM ALFABÉTICA
    public static function fornecedores(){
        $dao = new ContratopreDao();
        return $dao->fornecedores();
    }
}
