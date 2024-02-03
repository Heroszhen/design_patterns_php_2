<?php
//cela permettre une seule instanciation d'une classe pour éviter d'utiliser des ressources inutilement
//connexion à une base de données(pdo pour mysql, PredisClient pour redis)

use PDO;

class ConnectMysql{
    private static $pdo = null;

    private function __construct() {}

    public static function getPDO() {
        if (self::$pdo === null) {
            $pdo = new PDO("sqlite: db.sqlite");
        }

        return $pdo;
    }
}

$pdo = ConnectMysql::getPDO();
var_dump($pdo);