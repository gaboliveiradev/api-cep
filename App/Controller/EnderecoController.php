<?php
namespace App\Controller;

class EnderecoController extends Controller {

    public static function teste() {
        //var_dump("Rafael Sanchez... Moçada... To Inu... Tiu");
        parent::getResponseAsJSON($arr_cidades = ["Bariri", "Jau", "Itapuí", "Bauru"]);
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