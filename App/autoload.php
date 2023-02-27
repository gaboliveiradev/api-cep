<?php
    spl_autoload_register(function ($class) {

        // [OK] - str_replace, utilizado para trocar todas as barras invertidas por barra normal. Pois somente no
        // windows são as barras invertidas, no linux utiliza-se barra normal, assim podendo gerar um conflito.
        $arq = BASEDIR . '/' . str_replace("\\", "/", $class) . '.php';

        if(file_exists($arq)) {
            include $arq;
        } else 
            exit('Arquivo não encontrado. Arquivo: ' . $arq . "<br />");
    });