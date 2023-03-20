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
            parent::getResponseAsJSON($model->getCepByLogradouro( (string) $logradouro));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function getLogradouroByCep() : void {
        try 
        {
            $cep = parent::getIntFromUrl(isset($_GET['cep']) ? $_GET['cep'] : null);

            $model = new EnderecoModel();

            parent::getResponseAsJSON($model->getLogradouroByCep( (int) $cep));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function getLogradouroByBairroAndCidade() : void {
        try 
        {
            $bairro = parent::getStringFromUrl(isset($_GET['bairro']) ? $_GET['bairro'] : null, 'bairro');
            $id_cidade = parent::getIntFromUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null, 'cep');

            $model = new EnderecoModel();
            parent::getResponseAsJSON($model->getLogradouroByBairroAndCidade( (string) $bairro, (int) $id_cidade));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function getCidadesByUf() {
        try 
        {
            $uf = $_GET['uf'];

            $model = new EnderecoModel();
            parent::getResponseAsJSON($model->getCidadesByUf($uf));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function getBairrosByIdCidade() : void 
    {
        try 
        {
            $id_cidade = parent::getIntFromUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);

            $model = new EnderecoModel();
            parent::getResponseAsJSON($model->getBairrosByIdCidade( (int) $id_cidade));
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }    
    }
}