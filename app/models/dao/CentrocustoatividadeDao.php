<?php

namespace app\models\dao;

use app\core\Model;

class CentrocustoatividadeDao extends Model
{
    public function centrocustoatividadeprojeto()
    {
        $sql = "SELECT * FROM centrocustoatividade as ca, centrocusto as cc, projeto as p
                WHERE         ca.id_centrocusto = cc.id_centrocusto
                AND           cc.id_projeto = p.id_projeto";
        return Model::select($this->db, $sql, TRUE);
    }

    // MOSTRA CENTRO DE CUSTOS COM PROJETOS ATIVOS
    public function ccprojeto()
    {
        $sql = "SELECT * FROM centrocusto as cc, projeto as p
                WHERE         cc.id_projeto = p.id_projeto
                AND           ativo = 'S'
                ORDER BY      p.projeto, cc.centrocusto";
        return Model::select($this->db, $sql, TRUE);
    }
}
