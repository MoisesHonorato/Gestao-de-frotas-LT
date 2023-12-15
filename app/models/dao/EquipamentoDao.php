<?php

namespace app\models\dao;

use app\core\Model;

class EquipamentoDao extends Model
{
    public function inserir($equipamento)
    {
        $equipamento = is_array($equipamento) ? $equipamento : (array) $equipamento;
        return $this->add($this->db, $equipamento, "equipamento");
    }
}
