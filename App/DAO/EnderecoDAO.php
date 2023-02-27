<?php
namespace App\DAO;

class EnderecoDAO extends DAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 
    
    function selectByCep(int $cep) 
    {

    }

    function selectCepByLogradouro(string $logradouro) 
    {

    }

    function selectBairrosByIdCidade(int $id_cidade) 
    {

    }
}