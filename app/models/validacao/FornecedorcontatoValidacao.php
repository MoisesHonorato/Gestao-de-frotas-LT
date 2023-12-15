<?php

namespace app\models\validacao;

use app\core\Validacao;

class FornecedorcontatoValidacao
{
    public static function salvar($fornecedorcontato)
    {
        $validacao = new Validacao();

        $validacao->setData("telefone", $fornecedorcontato->telefone);
        $validacao->setData("email", $fornecedorcontato->email);

        //fazendo a validação
        $validacao->getData("telefone")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();

        return $validacao;
    }
}
