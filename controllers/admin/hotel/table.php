<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$hotels = $class->query("SELECT * FROM `hotel`")->fetchAll();


if (isset($_POST['activeBtn'])) {
    $activeHotels = $_POST['active'];
    $hoId = $_POST['hoId'];
    $query = "UPDATE `hotel` SET `active` = '$activeHotels' WHERE `hotel`.`id` = '$hoId'";
    if ($class->query($query)) {
        header("location:hotelTable");
    }
}

include views("/admin/hotel/tabele.php");
