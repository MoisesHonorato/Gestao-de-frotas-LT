<?php

namespace app\models\validacao;

use app\core\Validacao;

class ContratovigenciaValidacao
{
    public static function salvar($contrato)
    {
        $validacao = new Validacao();

        $validacao->setData("vigencia", $contrato->vigencia);
        $validacao->setData("aditivo", $contrato->aditivo);

        //fazendo a validação
        $validacao->getData("vigencia")->isVazio();
        $validacao->getData("datacontrato")->isVazio();

        return $validacao;
    }
}
