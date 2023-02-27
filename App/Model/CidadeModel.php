<?php
namespace App\Model;

use App\DAO\CidadeDAO;
use Exception;

class CidadeModel extends Model {

    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd;

    public function getCidadesByUf(string $uf) 
    {
        try 
        {
            $dao = new CidadeDAO();
            return $dao->selectCidadesByUf((string) $uf);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}