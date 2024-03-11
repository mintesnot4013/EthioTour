<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);
$hotels = $class->query("SELECT * FROM `hotel` where `active` = 1")->fetchAll();
include views("/hotel/hotels.page.view.php");
