<?php

use Core\Database;

$config = include views("config.php");
$class = new Database($config['database']);

$places = $class->query("SELECT * FROM `place` where id = :id", ['id' => $_GET['id']])->fetchAll();

include views("place/place.view.php");
