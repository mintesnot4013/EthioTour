<?php

use Core\Database;

$config = include views("/config.php");

$class = new Database($config['database']);
$search = $_POST['search'];

$places = $class->query("SELECT * FROM `place` WHERE `name` REGEXP  ?", [$search])->fetchAll();

$hotels = $class->query("SELECT * FROM `hotel` WHERE `name` REGEXP  ?", [$search])->fetchAll();



include views("/search.php");
