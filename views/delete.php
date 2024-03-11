<?php

use Core\Database;

$config = include views("/config.php");

$class = new Database($config['database']);





if (isset($_GET['id'])) {

    echo  $id = $_GET['id'];

    $query = "DELETE FROM `comment` WHERE id = $id ";

    $hotels = $class->query($query);

    if ($hotels) {
        header("location:user");
    }
}


if (isset($_GET['Bookingid'])) {
    echo $bookingid = $_GET['Bookingid'];

    $query = "DELETE FROM `booking` WHERE id = $bookingid ";

    $booking = $class->query($query);

    if ($booking) {
        header("location:user");
        session_start();
        $_SESSION['dateIn'] = [null];
        exit();
    } else {
        echo 'error';
    }
}
