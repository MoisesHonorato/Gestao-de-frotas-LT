<?php

namespace app\models\service;

use app\models\validacao\FornecedorbancoValidacao;
use app\models\dao\FornecedorbancoDao;

class FornecedorbancoService
{
    public static function salvar($Fornecedorbanco, $campo, $tabela)
    {
        $validacao = FornecedorbancoValidacao::salvar($Fornecedorbanco);
        return Service::salvar($Fornecedorbanco, $campo, $validacao->listaErros(), $tabela);
    }

    public static function Fornecedorbancoprojeto()
    {
        $dao = new FornecedorbancoDao();
        return $dao->Fornecedorbanco();
    }

    // LISTA OS PROJETOS ATIVOS
    public static function ordenarfornecedor()
    {
        $dao = new FornecedorbancoDao();
        return $dao->ordenarfornecedor();
    }
}
