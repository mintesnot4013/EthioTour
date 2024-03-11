<?php
const BASE_PATH = __DIR__ . '/../';

include BASE_PATH . "Core/function.php";

spl_autoload_register(function ($class) {


    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $replaceClass = $class . '.php';

    include base_path("$replaceClass");
});

$router = new \Core\Router();

$routers = include base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
