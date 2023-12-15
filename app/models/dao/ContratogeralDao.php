<?php

namespace app\models\dao;

use app\core\Model;

class ContratogeralDao extends Model
{
    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function contratogeral()
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

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    public function getcontratogeral($id)
    {
        $sql = "SELECT  c.*, f.*, p.*, v.id_contrato, SUM(v.vigencia) AS vigencia,
            DATE_ADD(c.datacontrato, interval SUM(v.vigencia) day) AS vencimento,
            DATEDIFF(DATE_ADD(c.datacontrato, interval SUM(v.vigencia) day), CURRENT_DATE) AS restam
            FROM    contrato AS c, fornecedor AS f, projeto AS p, contratovigencia AS v
            WHERE   c.id_contrato       = $id      
            AND     c.id_projeto        = p.id_projeto      
            AND     c.id_fornecedor     = f.id_fornecedor   -- chama tabela fornecedor
            AND     c.id_contrato       = v.id_contrato     -- chama tabela contratovigencia
            AND     c.contratostatus    = '1'               -- somente contrato ativo
            GROUP BY  c.id_contrato                         -- agrupa todas informações pelo contrato
            ";

        $contratogeral = Model::select($this->db, $sql, false);
        // i($contratogeral);
        return $contratogeral;
    }

    public function getdadosbancarios($id)
    {
        $sql = "SELECT * FROM fornecedorbanco as fb, contrato as c
                WHERE fb.id_fornecedor  = c.id_fornecedor
                AND 	c.id_contrato   = $id";

        return Model::select($this->db, $sql, true);
    }

    public function getcontato($id)
    {
        $sql = "SELECT * FROM   fornecedorcontato as fc, contrato as c
                WHERE           fc.id_fornecedor    = c.id_fornecedor
                AND 	        c.id_contrato       = $id";

        return Model::select($this->db, $sql, true);
    }

    public function getobjeto($id)
    {
        $sql = "SELECT  DATEDIFF(CURRENT_DATE, co.mobilizacao) AS diastrabalhados, e.*, co.*, c.*
                FROM    equipamento as e, contratoobjeto as co, contrato as c
                WHERE   co.id_contrato      = $id
                AND     co.id_contrato      = c.id_contrato
                AND     co.id_equipamento   = e.id_equipamento";

        return Model::select($this->db, $sql, true);
    }

    // LISTA AS TABELAS (CONTRATO, FORNECEDOR, PROJETO E CONTRATOVIGENCIA)
    // public function contrato()
    // {
    //     $sql = "SELECT      c.*, f.*, p.*, v.id_contrato, v.vigencia,
    //                         (date_add(c.datacontrato, interval SUM(v.vigencia) day)) AS vencimento
    //             FROM        contrato AS c, fornecedor AS f, projeto AS p, contratovigencia AS v
    //             WHERE       c.id_fornecedor  = f.id_fornecedor
    //             AND         c.id_projeto     = p.id_projeto AND c.id_contrato    = v.id_contrato
    //             GROUP BY    c.id_contrato";

    //     return Model::select($this->db, $sql, TRUE);
    // }

    // public function projetoativo()
    // {
    //     $sql = "SELECT * FROM projeto as p
    //                     WHERE p.ativo = 'S'
    //                     ORDER BY projeto";

    //     return Model::select($this->db, $sql, TRUE);
    // }

    // // LISTA TODOS FORNECEDORES POR ORDEM ALFABETICA
    // public function fornecedores()
    // {
    //     $sql = "SELECT * FROM fornecedor ORDER BY razao";

    //     return Model::select($this->db, $sql, TRUE);
    // }
}
