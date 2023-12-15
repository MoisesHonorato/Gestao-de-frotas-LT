<?php

namespace app\models\service;

use app\models\validacao\ColaboradorValidacao;
use app\models\dao\ColaboradorDao;

class ColaboradorService
{
    public static function salvar($colaborador, $campo, $tabela)
    {
        $validacao = ColaboradorValidacao::salvar($colaborador);
        return Service::salvar($colaborador, $campo, $validacao->listaErros(), $tabela);
    }

    public static function colaboradorgeral()
    {
        $dao = new ColaboradorDao();

        // Lista os todos os Colabores, Projetos e Funcões
        return $dao->colaboradorgeral();
    }

    // LISTA OS PROJETOS ATIVOS
    public static function projetoativo()
    {
        $dao = new ColaboradorDao();
        return $dao->projetoativo();
    }

    // LISTA AS FUNÇÕES
    public static function funcao()
    {
        $dao = new ColaboradorDao();
        return $dao->funcao();
    }
}
