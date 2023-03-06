<?php

namespace App\DAO;

use \PDO;
use \Exception;
use \PDOException;

abstract class DAO extends PDO {

    protected $conexao;
    public function __construct() {
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['dbname'];
            $this->conexao = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass'], $options);
        } catch (PDOException $err) {
            throw new Exception("Ocorreu um erro ao tentar conectar-se ao MySQL", 0, $err);
        }
    }
}