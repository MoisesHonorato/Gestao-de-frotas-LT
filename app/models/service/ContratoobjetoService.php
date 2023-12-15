<?php

namespace app\models\service;

use app\models\validacao\ContratoobjetoValidacao;
use app\models\dao\ContratoobjetoDao;

class ContratoobjetoService
{
    public static function salvar($contratoobjeto, $campo, $tabela)
    {
        $validacao = ContratoobjetoValidacao::salvar($contratoobjeto);
        return Service::salvar($contratoobjeto, $campo, $validacao->listaErros(), $tabela);
    }

    public static function lista()
    {
        $dao = new ContratoobjetoDao();
        return $dao->lista();
    }

    public static function objetogeral()
    {
        $dao = new ContratoobjetoDao();
        return $dao->objetogeral();
    }

    public static function contratoativo()
    {
        $dao = new ContratoobjetoDao();
        return $dao->contratoativo();
    }
}
