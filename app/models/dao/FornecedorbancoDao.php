<?php

namespace app\models\dao;

use app\core\Model;

class FornecedorbancoDao extends Model
{
    public function fornecedorbanco()
    {
        $sql = "SELECT * FROM fornecedorbanco as fc, fornecedor as f
                        WHERE fc.id_fornecedor = f.id_fornecedor";
        return Model::select($this->db, $sql, TRUE);
    }

    public function ordenarfornecedor()
    {
        //ORDENA O FORNECEDOR PELO CAMPO RAZAO
        $sql = "SELECT * FROM fornecedor ORDER BY razao";
        return Model::select($this->db, $sql, TRUE);
    }

    
}
