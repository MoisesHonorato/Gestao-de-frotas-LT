<?php

namespace app\models\service;

use app\models\validacao\CentrocustoValidacao;
use app\models\dao\CentrocustoDao;

class CentrocustoService
{
    public static function salvar($centrocusto, $campo, $tabela)
    {
        $validacao = CentrocustoValidacao::salvar($centrocusto);
        return Service::salvar($centrocusto, $campo, $validacao->listaErros(), $tabela);
    }

    public static function centrocustoprojeto()
    {
        $dao = new CentrocustoDao();
        return $dao->centrocustoprojeto();
    }

    // LISTA OS PROJETOS ATIVOS
    public static function projetoativo()
    {
        $dao = new CentrocustoDao();
        return $dao->projetoativo();
    }
}
