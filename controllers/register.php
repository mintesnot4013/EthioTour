<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hotel = $_POST['hotel'];
    $date = date('y-m-d');

    $emailUsed = $class->query("SELECT * FROM `user` WHERE `email` = :email", ['email' => $_POST['email']])->fetch(PDO::FETCH_ASSOC);


    if (empty($_POST['name'])) {
        $error['name'] = 'Name is require';
    } elseif (!preg_match("/^[a-zA-Z- ']*$/", $_POST['name'])) {
        $error['name'] = 'Only letters and white space allowed';
    } elseif (empty($_POST['email'])) {
        $error['email'] = 'Email is require';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Invalid email format';
    } elseif ($emailUsed) {
        $error['email'] = 'this email already used';
    } elseif (empty($_POST['password'])) {
        $error['password'] = 'password is require';
    } elseif (strlen($_POST['password']) < 8) {
        $error['password'] = 'password atleast 8 or above number of charachter';
    } else {

        if (isset($_POST['hotel'])) {
            if (strlen($_POST['hotel']) === 10) {
                $hotelsAdmin = $class->query("INSERT INTO`user` (`name`, `email`, `password`, `date`,`admin`) VALUES ('$name', '$email', '$password', '$date',2)");
                if ($hotelsAdmin) {

                    session_start();
                    $_SESSION['user'] = $email;
                    session_regenerate_id(true);
                    header('location:/hotelAdmin');
                    exit();
                }
            }
        } else {
            $user = $class->query("INSERT INTO`user` (`name`, `email`, `password`, `date`) VALUES ('$name', '$email', '$password', '$date')");

            if ($user) {
                session_start();
                $_SESSION['user'] = $email;
                session_regenerate_id(true);

                if (isset($_POST["backbooking"])) {
                    header('location:hotel');
                }
                header('location:/');
                exit();
            } else {
                header("location:/login");
            }
        }
    }
}
include views("/register.view.php");
