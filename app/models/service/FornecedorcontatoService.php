<?php

namespace app\models\service;

use app\models\validacao\FornecedorcontatoValidacao;
use app\models\dao\FornecedorcontatoDao;

class FornecedorcontatoService
{
    public static function salvar($Fornecedorcontato, $campo, $tabela)
    {
        $validacao = FornecedorcontatoValidacao::salvar($Fornecedorcontato);
        return Service::salvar($Fornecedorcontato, $campo, $validacao->listaErros(), $tabela);
    }

    public static function Fornecedorcontatoprojeto()
    {
        $dao = new FornecedorcontatoDao();
        return $dao->Fornecedorcontato();
    }

    // LISTA OS PROJETOS ATIVOS
    public static function ordenarfornecedor()
    {
        $dao = new FornecedorcontatoDao();
        return $dao->ordenarfornecedor();
    }
}
