<?php

use Core\Database;

$config = include views("/config.php");

$class = new Database($config['database']);

$query = "SELECT * FROM `hotel` where `id` = :id";
$hotels = $class->query($query, [
    'id' => $_GET['Hotelid'],
])->fetchAll();



include views("/admin/hotel/profile.php");
