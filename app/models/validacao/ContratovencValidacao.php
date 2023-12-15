<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class ContratovencValidacao
{
    public static function salvar($contratovenc)
    {
        $validacao = new Validacao();

        $validacao->setData("contratovenc", $contratovenc->contratovenc);
        $validacao->setData("datacontratovenc", $contratovenc->datacontratovenc);
        $validacao->setData("valormobilizacao", $contratovenc->valormobilizacao);
        $validacao->setData("valordesmobilizacao", $contratovenc->valordesmobilizacao);
        $validacao->setData("maoobra", $contratovenc->maoobra);

        //fazendo a validação
        $validacao->getData("contratovenc")->isVazio();
        $validacao->getData("datacontratovenc")->isVazio();
        $validacao->getData("valormobilizacao")->isVazio();
        $validacao->getData("valordesmobilizacao")->isVazio();
        $validacao->getData("maoobra")->isVazio();

        if (isset($contratovenc->contratovenc) && !isset($contratovenc->id_contratovenc)) :
            $tem = Service::get('contratovenc', 'contratovenc', $contratovenc->contratovenc);

            // Verifica se existe um contratovenc identico no banco de dados
            if (isset($tem) && ($tem->contratovenc == $contratovenc->contratovenc)) :

                // Se existir um Contratovenc vai entrar nesta condições
                $validacao->getData("contratovenc")->isUnico(1, 'Este Contratovenc já está cadastrado!');
            endif;
        endif;

        return $validacao;
    }
}
