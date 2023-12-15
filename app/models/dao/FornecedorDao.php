<?php

namespace app\models\dao;

use app\core\Model;

class FornecedorDao extends Model
{
    public function inserir($fornecedor)
    {
        $fornecedor = is_array($fornecedor) ? $fornecedor : (array) $fornecedor;
        return $this->add($this->db, $fornecedor, "fornecedor");
    }
}
