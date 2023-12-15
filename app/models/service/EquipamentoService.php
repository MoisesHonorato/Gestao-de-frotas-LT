<?php

namespace app\models\service;

use app\models\validacao\EquipamentoValidacao;
use app\util\UtilService;

class EquipamentoService
{
    public static function salvar($equipamento, $campo, $tabela)
    {
        $validacao = EquipamentoValidacao::salvar($equipamento);

        return Service::salvar($equipamento, $campo, $validacao->listaErros(), $tabela);
    }
}
