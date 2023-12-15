<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class CentrocustoatividadeValidacao
{
    public static function salvar($ccatividade)
    {
        $validacao = new Validacao();

        $validacao->setData("atividade", $ccatividade->atividade);

        //fazendo a validação
        $validacao->getData("atividade")->isVazio();

        //Verifica se existe o valor no banco de dados
        if (isset($ccatividade->atividade) && !isset($ccatividade->id_cc_atividade)) :

                          //get($tabela,                $campo,     $valor, $eh_lista=false)
            $tem = Service::get('centrocustoatividade', 'atividade', $ccatividade->atividade);

            // Verifica se existe uma atividde identica no banco de dados
            if (isset($tem) && ($tem->atividade == $ccatividade->atividade)) :

                // Se existir um Centro de Custo vai entrar nesta condições
                $validacao->getData("atividade")->isUnico(1, 'Esta atividade já está cadastrada!');
            endif;
        endif;

        return $validacao;
    }
}
