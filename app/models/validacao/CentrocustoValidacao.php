<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class CentrocustoValidacao
{
    public static function salvar($centrocusto)
    {
        $validacao = new Validacao();

        $validacao->setData("centrocusto", $centrocusto->centrocusto);
        $validacao->setData("descricao", $centrocusto->descricao);

        //fazendo a validação
        $validacao->getData("centrocusto")->isVazio();
        $validacao->getData("descricao")->isVazio();

        if (isset($centrocusto->centrocusto) && !isset($centrocusto->id_centrocusto)) :
            $tem = Service::get('centrocusto', 'centrocusto', $centrocusto->centrocusto);
            
            // Verifica se existe um centro de custo identico no banco de dados
            if (isset($tem) && ($tem->centrocusto == $centrocusto->centrocusto)) :

                // Se existir um Centro de Custo vai entrar nesta condições
                $validacao->getData("centrocusto")->isUnico(1, 'Este Centro de Custo já está cadastrado!');
            endif;
        endif;

        return $validacao;
    }
}
