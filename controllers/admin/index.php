<?php

use Core\Database;


$config = include views("/config.php");
$class = new Database($config['database']);

session_start();
$email = $_SESSION['user'];

if ($email) {

    $users = $class->query("SELECT * FROM `user` where email =  '$email'")->fetchAll();
    foreach ($users as $user) {

        $admin = $user['admin'];
    }
    if ($admin == 1) {
        $places = $class->query("SELECT COUNT(*) FROM `place`")->fetchAll();
        $users = $class->query("SELECT COUNT(*) FROM `user`")->fetchAll();
        $hotels = $class->query("SELECT COUNT(*) FROM `hotel`")->fetchAll();
        include views("/admin/dashboard.php");
    } else {
        abort();
    }
} else {
    header("location:loginAsAdmin");
}
