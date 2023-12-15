<?php

namespace app\models\service;

use app\models\validacao\CondutorValidacao;
use app\models\dao\CondutorDao;

class CondutorService
{
    public static function salvar($condutor, $campo, $tabela)
    {
        $validacao = CondutorValidacao::salvar($condutor);

        return Service::salvar($condutor, $campo, $validacao->listaErros(), $tabela);
    }

    public static function condutorgeral()
    {
        $dao = new CondutorDao();
        return $dao->condutorgeral();
    }

    // LISTA OS COLABORADORES ATIVOS
    public static function condutorativo()
    {
        $dao = new CondutorDao();
        return $dao->condutorativo();
    }
}
