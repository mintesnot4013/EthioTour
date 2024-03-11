<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);


if (isset($_POST['submit'])) {

    $hotelId = $_POST['hotelId'];
    $userId = $_POST['userId'];
    $date = date('y-m-d');


    if ($rate = $_POST['star']
        > 0
    ) {
        $rate = $_POST['star'];
    } else {
        $rate = 0;
    }


    include "function.php";
    session_start();
    $email = $_SESSION['user'];

    $comment = $_POST['comment'];
    $rate = $_POST['star'];
    $userId = $_POST['userId'];
    $hotelId = $_POST['hotelId'];
    $date = date('y-m-d');

    $query = "insert into comment(comment,rate,userId,hotelId,date) values('$comment',$rate,$userId,$hotelId,'$date')";
    $commented = $class->query($query);



    $commented ? header("location:/hotel?id={$hotelId}") : exit();
    echo "error";
    exit();
}


if (isset($_POST['upload'])) {

    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']["tmp_name"];
    $path = 'assets/img/user/';
    $userId = $_POST['id'];

    $uploded =  move_uploaded_file($imageTmp, $path . $image);
    if ($uploded) {

        $query = "UPDATE user SET profileImage = '$image' where id = $userId";

        $class->query($query);
        header("location:user");
    }
}
