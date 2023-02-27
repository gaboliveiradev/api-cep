<?php
namespace App\DAO;

class CidadeDAO extends DAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 
    
    function selectCidadesByUf(string $uf) 
    {

    }
}