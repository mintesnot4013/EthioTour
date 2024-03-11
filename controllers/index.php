<?php

use Core\Database;

$config = include views("config.php");

$class = new Database($config['database']);

$places = $class->query("SELECT * FROM `place`")->fetchAll();

$limitPlaces = $class->query(" SELECT * FROM `place`  LIMIT 6 ")->fetchAll();

$placeId = $class->query("SELECT * FROM `place` order by RAND() LIMIT 1")->fetchAll();

include views("index.view.php");
