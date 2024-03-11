<?php

use Core\Database;

$config = include views("/config.php");

$class = new Database($config['database']);

$hotels = $class->query("SELECT * FROM `hotel` where id = :id", ['id' => $_GET['id']])->fetchAll();


if (isset($_POST['book'])) {
    session_start();
    if (isset($_SESSION['user'])) {
        $uerid = $_POST['userId'];
        $hotelId = $_POST['hotelId'];
        $dateIn = $_POST['dateIn'];
        $dateOut = $_POST['dateOut'];
        $guest = $_POST['guest'];
        $date = date('y-m-d');
        $room = $_POST['room'];

        $query = "INSERT INTO `booking` (`userId`, `hotelId`, `dateIn`, `dateOut`, `guest`, `bookingDate`, `room`)
                                VALUES (' $uerid', '$hotelId', '$dateIn', '$dateOut', ' $guest', '$date', '$room ')";

        if ($class->query($query)) {
            header("location:hotel?id=$hotelId");
        } else {
            'error';
        }
    } else {
        header('location:register');
    }
}

include views("hotel/hotel.view.php");
