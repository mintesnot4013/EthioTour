<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$users = $class->query("SELECT * FROM `user`")->fetchAll();



include views("/admin/user/tabele.php");
