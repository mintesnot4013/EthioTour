<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

if (isset($_POST['hotelUpload']) and isset($_POST['hotelName'])) {
    $placeId = $_POST['placelId'];

    if (empty($_POST['hotelName'])) {
        $error['hotelName'] = 'hotel name is requerd';
    } elseif (empty($_POST['email'])) {

        $error['email'] = 'email is requerd';
    } elseif (empty($_POST['url'])) {

        $error['url'] = 'url is requerd';
    } elseif (empty($_POST['location'])) {

        $error['location'] = 'location is requerd';
    } elseif (empty($_POST['Description'])) {

        $error['Description'] = 'Description is requerd';
    } else {

        $name = $_POST['hotelName'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $url = $_POST['url'];
        $Date = date('y-m-d');

        $image = $_FILES['image']['name'];
        $image1 = $_FILES['image1']['name'];
        $image2 = $_FILES['image2']['name'];
        $image3 = $_FILES['image3']['name'];
        $image4 = $_FILES['image4']['name'];
        $Description = $_POST['Description'];
        $path = 'assets/img/hotels/';
        move_uploaded_file($_FILES['image']["tmp_name"], $path . $image);
        move_uploaded_file($_FILES['image1']["tmp_name"], $path . $image1);
        move_uploaded_file($_FILES['image2']["tmp_name"], $path . $image2);
        move_uploaded_file($_FILES['image3']["tmp_name"], $path . $image3);
        move_uploaded_file($_FILES['image4']["tmp_name"], $path . $image4);


        $query = "INSERT INTO `hotel`(`name`, `email`, `url`,`date`, `description`, `placeAddressURL`, `image`, `Image1`, `Image2`, `Image3`, `Image4`,`placeId`)
                     VALUES ('$name','$email','$url','$Date','$Description','$location','$image','$image1','$image2','$image3','$image4','$placeId')";

        if ($class->query($query)) {
            header("location:/hotelTable");
            exit();
        } else {
            echo 'error';
        }
    }
}




$query = "SELECT * FROM `place`";
$places = $class->query($query)->fetchAll();


include views("/admin/hotel/create.php");
