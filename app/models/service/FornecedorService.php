<?php

namespace app\models\service;

use app\models\validacao\FornecedorValidacao;
use app\util\UtilService;

class FornecedorService
{
    public static function salvar($fornecedor, $campo, $tabela)
    {
        global $config_upload;

        $validacao = FornecedorValidacao::salvar($fornecedor);

        if ($validacao->qtdeErro() <= 0) {
            // Fazendo o upload do arquivo
            if ($_FILES["arquivo"]["name"]) {
                $fornecedor->logo = UtilService::upload("arquivo", $config_upload);
                if (!$fornecedor->logo) {
                    return false;
                }
            }
        }
        // i($fornecedor);
        return Service::salvar($fornecedor, $campo, $validacao->listaErros(), $tabela);
    }
}
