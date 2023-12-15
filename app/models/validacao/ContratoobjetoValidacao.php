<?php

namespace app\models\validacao;

use app\core\Validacao;

class ContratoobjetoValidacao
{
    public static function salvar($contratoobjeto)
    {
        $validacao = new Validacao();

        $validacao->setData("valor", $contratoobjeto->valor);
        $validacao->setData("mobilizacao", $contratoobjeto->mobilizacao);

        //fazendo a validação
        $validacao->getData("valor")->isVazio();
        $validacao->getData("mobilizacao")->isVazio();

        return $validacao;
    }
}
