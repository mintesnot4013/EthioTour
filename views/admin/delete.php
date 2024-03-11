<?php
$config = include views("/config.php");
$class = new Database($config['database']);

if (isset($_POST['deletePlace'])) {

    $query = "DELETE  FROM `place` where `id` = :id";
    $places = $class->query($query, [
        'id' => $_POST['placeId'],
    ]);
    header("location:/placeTable");
}




if (isset($_POST['deleteHotel'])) {


    $query = "DELETE FROM `ethioTour`.`hotel` WHERE `id` = :id";
    $hotel = $class->query($query, [
        'id' => $_POST['hotelId'],
    ]);


    header("location:/hotelTable");
}

session_start();

$email = $_SESSION['user'];

$users = $class->query("SELECT * FROM `user` where email =  '$email'")->fetchAll();
foreach ($users as $user) {
}


if ($user['admin'] == 1) {
    if (isset($_POST['deleteUser']) and isset($_POST['userId'])) {

        $query = "DELETE  FROM `user` where `id` = :id";
        $places = $class->query($query, [
            'id' => $_POST['userId'],
        ]);
        header("location:/userTable");
    }
} else {
    auth();
}






if (isset($_GET['commentId'])) {
    $query = "DELETE  FROM `comment` where `id` = :commentId";
    $class->query($query, [
        'commentId' => $_GET['commentId'],
    ]);
    header("location:/user");
}




if (isset($_GET['Bookingid'])) {
    $query = "DELETE  FROM `booking` where `id` = :Bookingid";
    $class->query($query, [
        'Bookingid' => $_GET['Bookingid'],
    ]);
    header("location:/user");
}
