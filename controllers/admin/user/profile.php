<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$users = $class->query("SELECT * FROM `user` WHERE id = :id", [
    'id' => $_GET['id'],
])->fetchAll();

include views("/admin/user/profile.php");
