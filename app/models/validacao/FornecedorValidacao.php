<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class FornecedorValidacao
{
    public static function salvar($fornecedor)
    {
        $validacao = new Validacao();

        $validacao->setData("cnpj", $fornecedor->cnpj);
        $validacao->setData("razao", $fornecedor->razao);
        $validacao->setData("endereco", $fornecedor->endereco);
        $validacao->setData("numero", $fornecedor->numero);
        $validacao->setData("bairro", $fornecedor->bairro);
        $validacao->setData("cidade", $fornecedor->cidade);
        $validacao->setData("cep", $fornecedor->cep);
        $validacao->setData("uf", $fornecedor->uf);
        $validacao->setData("tipo", $fornecedor->tipo);

        //fazendo a validação
        $validacao->getData("cnpj")->isVazio()->isCNPJ();
        $validacao->getData("razao")->isVazio();
        $validacao->getData("endereco")->isVazio();
        $validacao->getData("numero")->isVazio();
        $validacao->getData("bairro")->isVazio();
        $validacao->getData("cidade")->isVazio();
        $validacao->getData("cep")->isVazio();
        $validacao->getData("uf")->isVazio();
        $validacao->getData("tipo")->isVazio();

        return $validacao;
    }
}
