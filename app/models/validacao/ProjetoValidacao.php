<?php

namespace app\models\validacao;

use app\core\Validacao;

class ProjetoValidacao
{
    public static function salvar($projeto)
    {
        $validacao = new Validacao();

        $validacao->setData("projeto", $projeto->projeto);
        $validacao->setData("empreendimento", $projeto->empreendimento);

        //fazendo a validação
        $validacao->getData("projeto")->isVazio();
        $validacao->getData("empreendimento")->isVazio();

        return $validacao;
    }
}
