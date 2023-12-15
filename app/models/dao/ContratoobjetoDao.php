<?php

namespace app\models\dao;

use app\core\Model;

class ContratoobjetoDao extends Model
{
// LISTA AS TABELAS (CONTRATO, FORNECEDOR, EQUIPAMENTO E OBJETO)
public function lista()
{
    $sql = "SELECT * FROM equipamento ORDER BY placa";

    return Model::select($this->db, $sql, TRUE);
}

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, EQUIPAMENTO E OBJETO)
    public function objetogeral()
    {
        $sql = "SELECT * FROM   contratoobjeto as o, contrato as c, fornecedor as f, equipamento as e
                WHERE           o.id_contrato    = c.id_contrato
                AND             o.id_equipamento = e.id_equipamento
                AND             c.id_fornecedor  = f.id_fornecedor
                ORDER BY        e.placa";

        return Model::select($this->db, $sql, TRUE);
    }

    // LISTA OS CONTRATOS ATIVOS
    public function contratoativo()
    {
        $sql = "SELECT * FROM contrato AS c, fornecedor AS f
                WHERE         c.id_fornecedor = f.id_fornecedor
                AND           contratostatus = 1
                ORDER BY      f.razao, c.contrato";

        return Model::select($this->db, $sql, TRUE);
    }
}
