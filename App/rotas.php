<?php
/*use App\Controller\{};*/

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    
    case "/welcome":
        
    break;

    default:
        header("Location: /welcome");
    break;
}