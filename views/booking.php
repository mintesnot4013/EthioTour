<?php

use Core\Database;

if (isset($_POST['book'])) {
    $config = include views("/config.php");
    $class = new Database($config['database']);

    $uerid = $_POST['userId'];
    $dateIn = $_POST['dateIn'];
    $dateOut =  $_POST['dateOut'];
    $adult = $_POST['adult'];
    $children =  $_POST['children'];
    $hotelId =  $_POST['hotelId'];
    $date = date('y-m-d');

    $query  = "INSERT INTO `booking`(`userId`, `hotelId`, `dateIn`, `dateOut`, `adult`, `children`, `bookingDate`) 
                                 VALUES ('$uerid','$hotelId','$dateIn','$dateOut','$adult','$children','$date')";


    $class->query($query) ? header("location:hotel?id=$hotelId") : 'error';
}
