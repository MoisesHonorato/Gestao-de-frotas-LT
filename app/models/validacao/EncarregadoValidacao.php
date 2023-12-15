<?php

namespace app\models\validacao;

use app\core\Validacao;

class EncarregadoValidacao
{
    public static function salvar($colaborador)
    {
        $validacao = new Validacao();

        // $validacao->setData("nome", $colaborador->nome);

        //fazendo a validação
        // $validacao->getData("nome")->isVazio();

        return $validacao;
    }
}
