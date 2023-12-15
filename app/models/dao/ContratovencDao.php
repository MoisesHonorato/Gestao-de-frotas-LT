<?php

namespace app\models\dao;

use app\core\Model;

class ContratovencDao extends Model
{
    public function inserir($contratovenc)
    {
        $contratovenc = is_array($contratovenc) ? $contratovenc : (array) $contratovenc;
        return $this->add($this->db, $contratovenc, "contratovenc");
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contratovencgeral()
    {
        $sql = "SELECT * FROM contrato AS c, fornecedor AS f, projeto AS p, contratovigencia AS v
                WHERE         c.id_contrato    = v.id_contrato
                AND           c.id_projeto     = p.id_projeto
                AND           c.id_fornecedor  = f.id_fornecedor
                GROUP BY      c.contrato";

        return Model::select($this->db, $sql, TRUE);
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contratovenc()
    {
        $sql = "SELECT  c.*, f.*, p.*, v.id_contrato, SUM(v.vigencia) AS vigencia,
                DATE_ADD(c.datacontrato, interval SUM(v.vigencia) day) AS vencimento,
                DATEDIFF(DATE_ADD(c.datacontrato, interval SUM(v.vigencia) day), CURRENT_DATE) AS restam
                FROM    contrato AS c, fornecedor AS f, projeto AS p, contratovigencia AS v
                WHERE   c.id_fornecedor     = f.id_fornecedor
                AND     c.id_projeto        = p.id_projeto
                AND     c.id_contrato       = v.id_contrato
                AND     c.contratostatus    = '1'
                GROUP BY  c.id_contrato";

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
