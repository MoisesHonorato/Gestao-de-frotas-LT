<?php

namespace app\models\dao;

use app\core\Model;

class EncarregadoDao extends Model
{
    public function encarregadogeral()
    {
        $sql = "SELECT * FROM
                    encarregado          AS e,
                    colaborador          AS c,
                    projeto              AS p,
                    centrocustoatividade AS a,
                    centrocusto	         AS cc
                WHERE
                    e.id_colaborador     = c.id_colaborador
                AND
                    e.id_cc_atividade    = a.id_cc_atividade
                AND
                    c.id_projeto		 = p.id_projeto
                AND
                    a.id_centrocusto     = cc.id_centrocusto";

        return Model::select($this->db, $sql, TRUE);
    }

    // SELECIONA TODOS COLABORADORES ATIVOS DO BANCO DE DADOS
    public function encarregadoativo()
    {
        $sql = "SELECT * FROM
        colaborador as c, funcao as f
        WHERE
        c.id_funcao = f.id_funcao
        ORDER BY c.nome";

        return Model::select($this->db, $sql, TRUE);
    }

    public function atividadesativas()
    {
        $sql = "SELECT * FROM
                    centrocustoatividade AS cc,
                    centrocusto AS c,
                    projeto AS p
                WHERE
                    cc.id_centrocusto = c.id_centrocusto
                AND
                    c.id_projeto = c.id_projeto
                AND
                    p.ativo = 'S'
                GROUP BY cc.atividade
                ORDER BY cc.atividade";

        return Model::select($this->db, $sql, TRUE);
    }
}
