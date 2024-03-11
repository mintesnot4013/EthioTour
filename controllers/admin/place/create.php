<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);
if (isset($_POST['create'])) {


    if (empty($_POST['name'])) {
        $error['name'] = 'place name is required';
    } elseif (empty($_POST['description'])) {

        $error['description'] = 'description is required';
    } elseif (empty($_POST['location'])) {

        $error['location'] = 'location is required';
    } elseif (empty($_POST['addition'])) {

        $error['addition'] = 'addition is required';
    } else {
        $name = $_POST['name'];
        $Description = $_POST['description'];
        $Date = date('y-m-d');
        $location = $_POST['location'];
        $url = $_POST['addition'];
        $region = $_POST['region'];

        $image = $_FILES['image']['name'];
        $image1 = $_FILES['image1']['name'];
        $image2 = $_FILES['image2']['name'];
        $image3 = $_FILES['image3']['name'];

        $path = 'assets/img/places/';
        move_uploaded_file($_FILES['image']["tmp_name"], $path . $_FILES['image']['name']);
        move_uploaded_file($_FILES['image1']["tmp_name"], $path . $_FILES['image1']['name']);
        move_uploaded_file($_FILES['image2']["tmp_name"], $path . $_FILES['image2']['name']);
        move_uploaded_file($_FILES['image3']["tmp_name"], $path . $_FILES['image3']['name']);

        $query = "INSERT INTO
  `place` (`name`, `description`, `date`, `placeAddressURL`, `additionalUrl`, `image1`, `image2`, `image3`, `image4`, `regionId`)
VALUES
  ('$name', '$Description', '$Date', '$location.', '$url', '$image', '$image1', '$image2', '$image3','$region')";


        $class->query($query) ? header("location:/placeTable") : header("location:/createPlace");
    }
}

include views("/admin/place/create.php");
