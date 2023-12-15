<?php

namespace app\models\service;

use app\models\validacao\CentrocustoatividadeValidacao;
use app\models\dao\CentrocustoatividadeDao;

class CentrocustoatividadeService
{
    public static function salvar($centrocustoatividade, $campo, $tabela)
    {
        $validacao = CentrocustoatividadeValidacao::salvar($centrocustoatividade);
        return Service::salvar($centrocustoatividade, $campo, $validacao->listaErros(), $tabela);
    }

    // MÉTEDO RESPONSÁVEL POR CHAMAR AS TABELAS ATIVIDADE, CENTROCUSTO E PROJETO
    public static function centrocustoatividadeprojeto()
    {
        $dao = new CentrocustoatividadeDao();
        return $dao->centrocustoatividadeprojeto();
    }

    // CHAMA OS CENTRO DE CUSTOS COM PROJETOS ATIVOS
    public static function ccprojeto()
    {
        $dao = new CentrocustoatividadeDao();
        return $dao->ccprojeto();
    }
}
