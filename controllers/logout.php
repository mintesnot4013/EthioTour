<?php

use Core\Database;

$config = include views("/config.php");
$class = new Database($config['database']);

if (isset($_POST['logout'])) {

    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    header('location:/');
    exit();
}




if ((isset($_POST['deleteUser']))) {


    session_start();
    $email = $_SESSION['user'];
    $users = $class->query("SELECT * FROM `user` where email =  '$email'")->fetchAll();
    foreach ($users as $user) {
    }
    if ($user['admin'] == 1) {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        header('location:/');
        exit();
    } else {
        $query = "DELETE FROM`user` WHERE `id` = :id";
        $userDelete = $class->query($query, ['id' => $_POST['id']]);
        if ($userDelete) {
            $_SESSION = [];
            session_destroy();
            $params = session_get_cookie_params();
            setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            header('location:/');
            exit();
        }
    }
}
