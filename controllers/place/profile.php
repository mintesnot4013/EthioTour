<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$query = "SELECT * FROM `place` where `id` = :id";
$places = $class->query($query, [
    'id' => $_GET['id'],
])->fetchAll();

include views("/place/place.view.php");
