<?php

namespace app\models\dao;

use app\core\Model;

class CondutorDao extends Model
{
    public function condutorgeral()
    {
        $sql = "SELECT con.*, con.id_mot_enc, co_mo.nome AS condutor, co_en.nome AS encarregado, pro.* FROM
        condutor AS con,
        colaborador AS co_mo,
        colaborador AS co_en,
        projeto AS pro
        WHERE
        con.id_motorista = co_mo.id_colaborador
        AND
        con.id_encarregado = co_en.id_colaborador
        AND
        co_mo.id_projeto = pro.id_projeto";
        return Model::select($this->db, $sql, TRUE);
    }

    // SELECIONA TODOS COLABORADORES ATIVOS DO BANCO DE DADOS
    public function condutorativo()
    {
        $sql = "SELECT * FROM
        colaborador as c, funcao as f
        WHERE
        c.id_funcao = f.id_funcao
        ORDER BY c.nome";
        return Model::select($this->db, $sql, TRUE);
    }
}
