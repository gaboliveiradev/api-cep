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
        $sql = "SELECT * FROM logradouro WHERE cep = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cep);
        $stmt->execute();

        $endereco_obj = $stmt->fetchObject("App\Model\EnderecoModel");
        $endereco_obj = $stmt->selectCidadesByUf($endereco_obj->UF);

        return $endereco_obj;
    }

    function selectCidadesByUf($uf) 
    {
        $sql = "SELECT * FROM cidade WHERE uf = ? ORDER BY descricao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $uf);
        $stmt->execute();
    }

    function selectCepByLogradouro(string $logradouro) 
    {

    }

    function selectBairrosByIdCidade(int $id_cidade) 
    {

    }
}