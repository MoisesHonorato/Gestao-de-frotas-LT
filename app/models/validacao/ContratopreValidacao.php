<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class ContratopreValidacao
{
    public static function salvar($contrato)
    {
        $validacao = new Validacao();

        $validacao->setData("contrato", $contrato->contrato);
        $validacao->setData("datacontrato", $contrato->datacontrato);
        $validacao->setData("valormobilizacao", $contrato->valormobilizacao);
        $validacao->setData("valordesmobilizacao", $contrato->valordesmobilizacao);
        $validacao->setData("maoobra", $contrato->maoobra);

        //fazendo a validação
        $validacao->getData("contrato")->isVazio();
        $validacao->getData("datacontrato")->isVazio();
        $validacao->getData("valormobilizacao")->isVazio();
        $validacao->getData("valordesmobilizacao")->isVazio();
        $validacao->getData("maoobra")->isVazio();

        if (isset($contrato->contrato) && !isset($contrato->id_contrato)) :
            $tem = Service::get('contrato', 'contrato', $contrato->contrato);

            // Verifica se existe um contrato identico no banco de dados
            if (isset($tem) && ($tem->contrato == $contrato->contrato)) :

                // Se existir um Contrato vai entrar nesta condições
                $validacao->getData("contrato")->isUnico(1, 'Este Contrato já está cadastrado!');
            endif;
        endif;

        return $validacao;
    }
}
