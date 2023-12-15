<?php

namespace app\models\service;

use app\models\validacao\EncarregadoValidacao;
use app\models\dao\EncarregadoDao;

class EncarregadoService
{
    public static function salvar($encarregado, $campo, $tabela)
    {
        $validacao = EncarregadoValidacao::salvar($encarregado);
        return Service::salvar($encarregado, $campo, $validacao->listaErros(), $tabela);
    }

    public static function encarregadogeral()
    {
        $dao = new EncarregadoDao();
        return $dao->encarregadogeral();
    }

    // LISTA OS COLABORADORES ATIVOS
    public static function encarregadoativo()
    {
        $dao = new EncarregadoDao();
        return $dao->encarregadoativo();
    }

     // LISTA AS ATIVIDADES ATIVAS
     public static function atividadesativas()
     {
         $dao = new EncarregadoDao();
         return $dao->atividadesativas();
     }

}
