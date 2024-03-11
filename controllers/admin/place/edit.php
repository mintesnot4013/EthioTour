<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

$query = "SELECT * FROM `place` where `id` = :id";
$places = $class->query($query, [
    'id' => $_GET['id'],
])->fetchAll();



foreach ($places as $place) {
}


$regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();




if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $placeAddress = $_POST['placeAddress'];
    $additionaInformation = $_POST['additionaInformation'];

    $update = "
update place set name = '$name' where  id = $id ;
update place set description = '$description' where  id = $id ;
update place set placeAddressURL = '$placeAddress' where  id = $id ;
update place set additionalUrl = '$additionaInformation' where  id = $id ;
";

    $class->query($update) ? header("location:/editPlace?id=$id") : 'eroor';;
}


if (isset($_POST['imageUpdate'])) {


    $id = $_GET['id'];


    if (empty($_FILES['image1']['name'])) {

        $image1 = $place['image1'];
    } else {
        $image1 = $_FILES['image1']['name'];
    }

    if (empty($_FILES['image2']['name'])) {
        $image2 = $place['image2'];
    } else {
        $image2 = $_FILES['image2']['name'];
    }
    if (empty($_FILES['image3']['name'])) {
        $image3 = $place['image3'];
    } else {
        $image3 = $_FILES['image3']['name'];
    }
    if (empty($_FILES['image4']['name'])) {

        $image4 = $place['image4'];
    } else {
        $image4 = $_FILES['image4']['name'];
    }

    $path = 'assets/img/places/';
    move_uploaded_file($_FILES['image1']["tmp_name"], $path . $_FILES['image1']['name']);
    move_uploaded_file($_FILES['image2']["tmp_name"], $path . $_FILES['image2']['name']);
    move_uploaded_file($_FILES['image3']["tmp_name"], $path . $_FILES['image3']['name']);
    move_uploaded_file($_FILES['image4']["tmp_name"], $path . $_FILES['image4']['name']);


    $query = "
update place set image1 = '$image1' where  id = $id ;
update place set image2 = '$image2' where  id = $id ;
update place set image3 = '$image3' where  id = $id ;
update place set image4 = '$image4' where  id = $id ;";

    $class->query($query) ? header("location:/editPlace?id=$id") : 'eroor';;
}


if (isset($_POST['updateToRegion'])) {

    $id = $_GET['id'];
    $region = $_POST['region'];
    $queryRegion = " update place set regionId = '$region' where id = '$id'";
    $class->query($queryRegion) ? header("location:/editPlace?id=$id") : 'eroor';
}


include views("/admin/place/edit.php");
