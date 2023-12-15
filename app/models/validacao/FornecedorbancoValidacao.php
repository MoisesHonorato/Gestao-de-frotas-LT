<?php

namespace app\models\validacao;

use app\core\Validacao;

class FornecedorbancoValidacao
{
    public static function salvar($fornecedorbanco)
    {
        $validacao = new Validacao();

        $validacao->setData("banco", $fornecedorbanco->banco);
        $validacao->setData("agencia", $fornecedorbanco->agencia);
        $validacao->setData("conta", $fornecedorbanco->conta);

        //fazendo a validação
        $validacao->getData("banco")->isVazio();
        $validacao->getData("agencia")->isVazio();
        $validacao->getData("conta")->isVazio();

        return $validacao;
    }
}
