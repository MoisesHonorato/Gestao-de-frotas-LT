<?php

namespace app\models\service;

use app\models\validacao\ProjetoValidacao;

class ProjetoService
{
    public static function salvar($projeto, $campo, $tabela)
    {
        $validacao = ProjetoValidacao::salvar($projeto);
        return Service::salvar($projeto, $campo, $validacao->listaErros(), $tabela);
    }
}
