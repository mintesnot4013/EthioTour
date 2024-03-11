<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$query = "SELECT * FROM `hotel` where `id` = :id";

$hotels = $class->query($query, [
    'id' => $_GET['id'],
])->fetchAll();



$id = $_GET['id'];


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $hotelAddress = $_POST['hotelAddress'];


    $update = "
update hotel set name = '$name' where  id = $id ;
update hotel set email = '$email' where  id = $id ;
update hotel set description = '$description' where  id = $id ;
update hotel set url = '$url' where  id = $id ;
update hotel set placeAddressURL = '$hotelAddress' where  id = $id ;
";
    $class->query($update);

    header("location:hotelTable");
    if ($class->query($query)) {
        header("location:/editHotel?id=$id");
    }
}




if (isset($_POST['imageUpdate'])) {

    foreach ($hotels as $hotel) {
    }

    if (empty($_FILES['image']['name'])) {

        $image = $hotel['image'];
    } else {
        $image = $_FILES['image']['name'];
    }




    if (empty($_FILES['image1']['name'])) {

        $image1 = $hotel['image1'];
    } else {

        $image1 = $_FILES['image1']['name'];
    }

    if (empty($_FILES['image2']['name'])) {

        $image2 = $hotel['image2'];
    } else {
        $image2 = $_FILES['image2']['name'];
    }


    if (empty($_FILES['image3']['name'])) {

        $image3 = $hotel['image3'];
    } else {
        $image3 = $_FILES['image3']['name'];
    }

    if (empty($_FILES['image4']['name'])) {

        $image4 = $hotel['image4'];
    } else {
        $image4 = $_FILES['image4']['name'];
    }



    $path = 'assets/img/hotels/';


    $query = "
update hotel set image = '$image' where  id = $id ;
update hotel set image1 = '$image1' where  id = $id ;
update hotel set image2 = '$image2' where  id = $id ;
update hotel set image3 = '$image3' where  id = $id ;
update hotel set image4 = '$image4' where  id = $id ;";


    move_uploaded_file($_FILES['image']["tmp_name"], $path . $image);
    move_uploaded_file($_FILES['image1']["tmp_name"], $path . $image1);
    move_uploaded_file($_FILES['image2']["tmp_name"], $path . $image2);
    move_uploaded_file($_FILES['image3']["tmp_name"], $path . $image3);
    move_uploaded_file($_FILES['image4']["tmp_name"], $path . $image4);




    if ($class->query($query)) {
        header("location:/hotelTable");
    } else {
        echo '<script> alert("cant update your edit")</script>';
    }
}


if (isset($_POST['add_facility'])) {

    if (empty($_POST['facility1'])) {
        $facility1  = 0;
    } else {
        $facility1 =  $_POST['facility1'];
    }
    if (empty($_POST['facility2'])) {
        $facility2  = 0;
    } else {
        $facility2 =  $_POST['facility2'];
    }
    if (empty($_POST['facility3'])) {
        $facility3  = 0;
    } else {
        $facility3 =  $_POST['facility3'];
    }
    if (empty($_POST['facility4'])) {
        $facility4  = 0;
    } else {
        $facility4 =  $_POST['facility4'];
    }
    if (empty($_POST['facility5'])) {
        $facility5  = 0;
    } else {
        $facility5 =  $_POST['facility5'];
    }
    if (empty($_POST['facility6'])) {
        $facility6  = 0;
    } else {
        $facility6 =  $_POST['facility6'];
    }


    $hotelId =  $_POST['hotelId'];



    $query = "INSERT INTO `facility` (`facility1`, `facility2`, `facility3`, `facility4`, `facility5`, `facility6`, `hotelId`) VALUES ('$facility1', '$facility2', '$facility3', '$facility4', '$facility5', '$facility6', '$hotelId');";

    if ($class->query($query)) {
        header('location:editHotel?id=' . $hotelId . '');
    }
}

include views("/admin/hotel/edit.php");
