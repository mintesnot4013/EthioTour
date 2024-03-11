<?php

use Core\Database;

$config = include base_path("views/config.php");

$class = new Database($config['database']);

$query = " SELECT * FROM `place`  LIMIT 6 ";

$limitPlaces = $class->query($query)->fetchAll();

include views("recommend.view.php");
