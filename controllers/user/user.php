<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);
session_start();
$email = $_SESSION['user'];
$users = $class->query("SELECT * FROM `user` where email =  '$email'")->fetchAll();
foreach ($users as $user) {
    $id = $user['id'];
}



if (isset($_POST['deleteHotel'])) {
    $id = $_POST['HotelId'];
    $query = "DELETE FROM `comment` WHERE id = $id ";
    header("location:user");
}



if (isset($_POST['deleteBooking'])) {
    $bookingid = $_POST['Bookingid'];


    $query = "DELETE FROM `booking` WHERE id = $bookingid ";

    if ($class->query($query)) {
        header("location:user");
        session_start();
        $_SESSION['dateIn'] = [null];
        exit();
    }
}

if (isset($_POST['EditProfile'])) {
    $id = $user['id'];

    $editName =  $_POST['name'];
    $editEmail = $_POST['email'];
    $editPassword =  $_POST['password'];
    $editPhone =  $_POST['phone'];

    $query = "UPDATE `user` SET `name` = '$editName' WHERE `user`.`id` = $id;
                       UPDATE `user` SET `email` = '$editEmail' WHERE `user`.`id` = $id;
                       UPDATE `user` SET `password` = '$editPassword' WHERE `user`.`id` = $id;
                    UPDATE `user` SET `phone` = '$editPhone' WHERE `user`.`id` = $id;";
    $class->query($query);

    session_start();
    $_SESSION['user'] = $editEmail;
    session_regenerate_id(true);
    header("location:/user");
}


if (isset($_POST['uploadImage'])) {

    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']["tmp_name"];
    $path = 'assets/img/user/';
    $userId = $user['id'];

    $uploded =  move_uploaded_file($imageTmp, $path . $image);

    if ($uploded) {
        $query = "UPDATE user SET profileImage = '$image' where id = $userId";
        $class->query($query);
        header("location:/user");
    }
}


if (isset($_POST['deletecomment'])) {

    $comm = $_POST['id'];
    $query = "DELETE FROM `ethioTour`.`comment` WHERE `id` = $comm";

    if ($class->query($query)) {
        header("location:/user");
    }
}

include views("/user/index.php");
