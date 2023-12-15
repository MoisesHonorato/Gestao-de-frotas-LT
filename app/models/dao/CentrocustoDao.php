<?php

namespace app\models\dao;

use app\core\Model;

class CentrocustoDao extends Model
{
    public function centrocustoprojeto()
    {
        $sql = "SELECT * FROM centrocusto as cc, projeto as p
                        WHERE cc.id_projeto = p.id_projeto
                        ORDER BY p.ativo DESC, cc.centrocusto";
        return Model::select($this->db, $sql, TRUE);
    }

    public function projetoativo()
    {
        $sql = "SELECT * FROM projeto as p
                        WHERE p.ativo = 'S'";
        return Model::select($this->db, $sql, TRUE);
    }

    
}
