<?php

namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class CondutorValidacao
{
    public static function salvar($condutor)
    {
        $validacao = new Validacao();

        $validacao->setData("id_motorista", $condutor->id_motorista);
        $validacao->setData("cnh", $condutor->cnh);
        $validacao->setData("cpf", $condutor->cpf);
        $validacao->setData("categoria", $condutor->categoria);
        $validacao->setData("emissao", $condutor->emissao);
        $validacao->setData("vencimento", $condutor->cnh);
        $validacao->setData("cnh", $condutor->cnh);

        //fazendo a validação
        $validacao->getData("id_motorista")->isVazio();
        $validacao->getData("cnh")->isVazio();
        $validacao->getData("cpf")->isVazio()->isCPF();
        $validacao->getData("categoria")->isVazio();
        $validacao->getData("emissao")->isVazio();
        $validacao->getData("vencimento")->isVazio();
        $validacao->getData("cnh")->isVazio();

        if (isset($condutor->cpf) && !isset($condutor->id_mot_enc)) :

            // ============ get(tabela, campo, valor) ===========
            $tem = Service::get('condutor', 'cpf', $condutor->cpf);

            // Verifica se existe um CPF identico no banco de dados
            if (isset($tem) && ($tem->cpf == $condutor->cpf)) :
                $validacao->getData("cpf")->isUnico(1, 'Este CPF já está cadastrado!');
            endif;

        endif;

        if (isset($condutor->cpf) && !isset($condutor->id_mot_enc)) :

            // ============ get(tabela, campo, valor) ===========
            $tem = Service::get('condutor', 'cpf', $condutor->cpf);

            // Verifica se existe um CPF identico no banco de dados
            if (isset($tem) && ($tem->cpf == $condutor->cpf)) :
                $validacao->getData("cpf")->isUnico(1, 'Este CPF já está cadastrado!');
            endif;
            
        endif;

        if (isset($condutor->id_motorista) && !isset($condutor->id_mot_enc)) :

            // ============ get(tabela, campo, valor) ===========
            $tem = Service::get('condutor', 'id_motorista', $condutor->id_motorista);

            // Verifica se existe um CPF identico no banco de dados
            if (isset($tem) && ($tem->id_motorista == $condutor->id_motorista)) :

                // ======== getData("campo da tabela") ==========
                $validacao->getData("id_motorista")->isUnico(1, 'Este Condutor já está cadastrado!');
            endif;
            
        endif;

        return $validacao;
    }
}
