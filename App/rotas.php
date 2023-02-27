<?php
use App\Controller\{
    EnderecoController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // [OK] https://localhost:8000/endereco/by-cep?cep=
    case "/endereco/by-cep":
        EnderecoController::getLogradouroByCep();
    break;

    // [OK] https://localhost:8000/logradouro/by-bairro?bairro=
    case "/logradouro/by-bairro":
        EnderecoController::getLogradouroByBairroAndCidade();
    break;

    // [OK] https://localhost:8000/cidades/by-uf?uf=
    case "/cidades/by-uf":
        EnderecoController::getCidadesByUf();
    break;

    // [OK] https://localhost:8000/bairro/by-cidade?cidade=
    case "/bairro/by-cidade":
        EnderecoController::getBairrosByCidade();
    break;

    //[403] - Servidor recebeu a requisição, indentificou o autor. Porém não autorizou a emissão da resposta.
    default:
        http_response_code(403);
    break;
}