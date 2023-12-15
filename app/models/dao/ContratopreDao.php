<?php

namespace app\models\dao;

use app\core\Model;

class ContratopreDao extends Model
{
    public function inserir($contrato)
    {
        $contrato = is_array($contrato) ? $contrato : (array) $contrato;
        return $this->add($this->db, $contrato, "contrato");
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contratogeral()
    {
        $sql = "SELECT * FROM contrato AS c, fornecedor AS f, projeto AS p
                WHERE         c.id_projeto     = p.id_projeto
                AND           c.id_fornecedor  = f.id_fornecedor";

        return Model::select($this->db, $sql, TRUE);
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contrato()
    {
        $sql = "SELECT      c.*, f.*, p.*, v.id_contrato, v.vigencia,
                            (date_add(c.datacontrato, interval SUM(v.vigencia) day)) AS vencimento
                FROM        contrato AS c, fornecedor AS f, projeto AS p, contratovigencia AS v
                WHERE       c.id_fornecedor  = f.id_fornecedor
                AND         c.id_projeto     = p.id_projeto AND c.id_contrato    = v.id_contrato
                GROUP BY    c.id_contrato";

        return Model::select($this->db, $sql, TRUE);
    }

    public function projetoativo()
    {
        $sql = "SELECT * FROM projeto as p
                        WHERE p.ativo = 'S'
                        ORDER BY projeto";

        return Model::select($this->db, $sql, TRUE);
    }

    // LISTA TODOS FORNECEDORES POR ORDEM ALFABETICA
    public function fornecedores()
    {
        $sql = "SELECT * FROM fornecedor ORDER BY razao";

        return Model::select($this->db, $sql, TRUE);
    }
}
