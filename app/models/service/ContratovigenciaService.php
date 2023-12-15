<?php

namespace app\models\service;

use app\models\validacao\ContratovigenciaValidacao;
use app\models\dao\ContratovigenciaDao;

class ContratovigenciaService
{
    public static function salvar($contratovigencia, $campo, $tabela)
    {
        $validacao = ContratovigenciaValidacao::salvar($contratovigencia);
        return Service::salvar($contratovigencia, $campo, $validacao->listaErros(), $tabela);
    }

    public static function contratogeral()
    {
        $dao = new ContratovigenciaDao();
        return $dao->contratogeral();
    }

    public static function contratoativo()
    {
        $dao = new ContratovigenciaDao();
        return $dao->contratoativo();
    }
}
