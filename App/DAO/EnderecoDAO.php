<?php
namespace App\DAO;
use \PDO;

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
        $endereco_obj->arr_cidades = $this->selectCidadesByUF($endereco_obj->uf);

        return $endereco_obj;
    }

    function selectLogradouroByBairroAndIdCidade(string $bairro, int $id_cidade) 
    {
        $sql = "SELECT * FROM logradouro WHERE bairro = ? AND id_cidade = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $bairro);
        $stmt->bindValue(2, $id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function selectCidadesByUf($uf) 
    {
        $sql = "SELECT * FROM cidade WHERE uf = ? ORDER BY descricao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $uf);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function selectCepByLogradouro(string $logradouro) 
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_sem_numero LIKE :q ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':q' => "%" . $logradouro . "%"]);      

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    function selectBairrosByIdCidade(int $id_cidade) 
    {
        $sql = "SELECT descricao_bairro FROM logradouro WHERE id_cidade = ? GROUP BY descricao_bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}