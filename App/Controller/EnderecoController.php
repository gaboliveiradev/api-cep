<?php
namespace App\Controller;

use App\Model\EnderecoModel;
use Exception;

class EnderecoController extends Controller {

    public static function teste() {
        //var_dump("Rafael Sanchez... Moçada... To Inu... Tiu");
        parent::getResponseAsJSON($arr_cidades = ["Bariri", "Jau", "Itapuí", "Bauru"]);
    }

    public static function getCepByLogradouro() : void 
    {
        try 
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            parent::getResponseAsJSON($model->getCepByLogradouro($logradouro));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function getLogradouroByCep() {

    }

    public static function getLogradouroByBairroAndCidade() {
        
    }

    public static function getCidadesByUf() {

    }

    public static function getBairrosByCidade() {
        
    }
}