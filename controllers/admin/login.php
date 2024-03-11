<?php

use Core\Database;

session_start();


if (isset($_POST['signIn'])) {

    $config = include views("/config.php");
    $class = new Database($config['database']);

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($_POST['email'])) {
        $error['email'] = 'Email is require';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Invalid email format';
    } elseif (empty($_POST['password'])) {
        $error['password'] = 'password is require';
    } elseif (strlen($_POST['password']) < 8) {
        $error['password'] = 'password atleast 8 or above number of charachter';
    } else {

        $admin = $class->query("SELECT * FROM `user` where `admin` = 1 and email = '$email' and password = '$password'")->fetch();

        if ($admin) {
            session_start();
            if ($_SESSION['user'] = $_POST['email']) {
                header("location:/et_admin");
                exit();
            }
        } else {

            $error['email'] = 'Check Email or Password';
            $error['password'] = '';
        }
    }
}

include views("/admin/sign-in.php");
