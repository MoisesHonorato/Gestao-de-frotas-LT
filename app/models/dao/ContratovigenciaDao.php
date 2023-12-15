<?php

namespace app\models\dao;

use app\core\Model;

class ContratovigenciaDao extends Model
{
    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contratogeral()
    {
        $sql = "SELECT * FROM   contratovigencia as v, contrato as c, fornecedor as f
                WHERE           v.id_contrato = c.id_contrato
                AND             c.id_fornecedor = f.id_fornecedor
                AND             c.contratostatus = 1";

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
