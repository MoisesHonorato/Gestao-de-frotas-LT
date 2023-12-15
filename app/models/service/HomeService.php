<?php

namespace app\models\service;

use app\models\validacao\ContratogeralValidacao;
use app\models\dao\HomeDao;

class HomeService
{
    // Lista os 5 contratos que vão vencer
    public static function contratovenc()
    {
        $dao = new HomeDao();
        return $dao->contratovenc();
    }

    // Lista as 5 CNH que vão vencer
    public static function cnhvenc()
    {
        $dao = new HomeDao();
        return $dao->cnhvenc();
    }


    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public static function getcontratogeral($id)
    {
        $dao = new ContratogeralDao();
        return $dao->getcontratogeral($id);
    }

    public static function getdadosbancarios($id)
    {
        $dao = new ContratogeralDao();
        return $dao->getdadosbancarios($id);
    }

    public static function getcontato($id)
    {
        $dao = new ContratogeralDao();
        return $dao->getcontato($id);
    }

    public static function getobjeto($id)
    {
        $dao = new ContratogeralDao();
        return $dao->getobjeto($id);
    }
}
