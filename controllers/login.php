<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailUsed = $class->query("SELECT * FROM `user` WHERE `email` = :email", ['email' => $_POST['email']])->fetch(PDO::FETCH_ASSOC);
    $passwordUsed = $class->query("SELECT * FROM `user` WHERE `password` = :password", ['password' => $_POST['password']])->fetch(PDO::FETCH_ASSOC);

    if (empty($_POST['email'])) {
        $error['email'] = 'Email is require';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Invalid email format';
    } elseif (empty($_POST['password'])) {
        $error['password'] = 'password is require';
    } elseif (strlen($_POST['password']) < 8) {
        $error['password'] = 'password atleast 8 or above number of charachter';
    } elseif ($emailUsed && $passwordUsed) {
        session_start();
        $user = $class->query("SELECT * FROM `user` where `email` = '$email' and `password` = '$password'")->fetchAll();
        $hotelAdmin = $class->query("SELECT * FROM `user` where `admin` = 2 and email = '$email' and password = '$password'")->fetchAll();
        if ($user) {
            $_SESSION['user'] = $_POST['email'];
            header('location:/');
            exit();
        } elseif ($hotelAdmin) {
            $_SESSION['user'] = $_POST['email'];
            header('location:hotelAdmin');
        }
    } else {
        $error['email'] = 'Check email or password';
        $error['password'] = '';
    }
}


include views("/login.view.php");
