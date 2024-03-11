<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public function __construct($config, $user = 'root', $password = 'root')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {

        $statment = $this->connection->prepare($query);
        $statment->execute($params);
        return $statment;
    }
}
