<?php

use Core\Database;

if (isset($_POST['search'])) {
    $search =   $_POST['search'];
    $config = include views("/config.php");
    $class = new Database($config['database']);
    $search = $_POST['search'];

    $places = $class->query("SELECT * FROM `place` WHERE `name` REGEXP  ?", [$search])->fetchAll();
    $hotels = $class->query("SELECT * FROM `hotel` WHERE `name` REGEXP  ?", [$search])->fetchAll();
    $users = $class->query("SELECT * FROM `user` WHERE `name` REGEXP  ?", [$search])->fetchAll();
}
include views("/admin/search.php");
