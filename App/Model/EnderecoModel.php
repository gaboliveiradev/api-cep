<?php
namespace App\Model;

use App\DAO\EnderecoDAO;
use Exception;

class EnderecoModel extends Model {
    
    public $id_logradouro, $tipo, $descricao, $id_cidade, $uf, $complemento, 
    $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro;

    public $arr_cidades;

    public function getLogradouroByCep(int $cep)
    {
        try 
        {
            $dao = new EnderecoDAO();
            return $dao->selectByCep((int) $cep);
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    }

    public function getCepByLogradouro(string $logradouro)
    {
        try 
        {
            $dao = new EnderecoDAO();
            return $dao->selectCepByLogradouro((string) $logradouro);
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    }

    public function getBairrosByIdCidade(int $id_cidade)
    {
        try 
        {
            $dao = new EnderecoDAO();
            return $dao->selectBairrosByIdCidade((int) $id_cidade);
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    }
}