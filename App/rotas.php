<?php
use App\Controller\{
    EnderecoController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    
    case "/teste":
        EnderecoController::teste();
    break;

    default:
        header("Location: /welcome");
    break;
}