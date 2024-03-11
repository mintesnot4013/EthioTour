<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$places = $class->query("SELECT * FROM `place`")->fetchAll();

include views("/admin/place/tabele.php");
