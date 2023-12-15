<?php

namespace app\models\dao;

use app\core\Model;

class ColaboradorDao extends Model
{
    // LISTA OS COLABORADORES, PROJETOS E FUNÇÕES
    public function colaboradorgeral()
    {
        $sql = "SELECT * FROM   colaborador as c, projeto as p, funcao as f
                WHERE           c.id_projeto   = p.id_projeto
                AND             c.id_funcao    = f.id_funcao
                ORDER BY        p.ativo DESC, c.nome";
        return Model::select($this->db, $sql, TRUE);
    }

    public function funcao()
    {
        $sql = "SELECT * FROM funcao ORDER BY funcao";
        return Model::select($this->db, $sql, TRUE);
    }

    public function projetoativo()
    {
        $sql = "SELECT * FROM projeto as p
                        WHERE p.ativo = 'S'";
        return Model::select($this->db, $sql, TRUE);
    }
}
