<?php

namespace app\models\validacao;

use app\core\Validacao;

class EquipamentoValidacao
{
    public static function salvar($equipamento)
    {
        $validacao = new Validacao();

        $validacao->setData("placa", $equipamento->placa);
        $validacao->setData("marca", $equipamento->marca);
        $validacao->setData("modelo", $equipamento->modelo);
        $validacao->setData("chassi", $equipamento->chassi);
        $validacao->setData("renavan", $equipamento->renavan);
        $validacao->setData("anomodelo", $equipamento->anomodelo);
        $validacao->setData("tipocategoria", $equipamento->tipocategoria);
        $validacao->setData("proprietario", $equipamento->proprietario);
        $validacao->setData("cpf_cnpj", $equipamento->cpf_cnpj);
        $validacao->setData("tipo_generico", $equipamento->tipo_generico);

        //fazendo a validação
        $validacao->getData("placa")->isVazio();
        $validacao->getData("marca")->isVazio();
        $validacao->getData("modelo")->isVazio();
        $validacao->getData("chassi")->isVazio();
        $validacao->getData("renavan")->isVazio();
        $validacao->getData("anomodelo")->isVazio();
        $validacao->getData("tipocategoria")->isVazio();
        $validacao->getData("proprietario")->isVazio();
        $validacao->getData("cpf_cnpj")->isVazio();
        $validacao->getData("tipo_generico")->isVazio();

        return $validacao;
    }
}
