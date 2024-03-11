<?php

function dd($url)
{
    echo "<pre>";
    die(var_dump($url));
}
function auth()
{
    $response = 'your note auth,';
    include "views/404.php";
};
function base_path($path)
{
    return BASE_PATH . $path;
}


function views($path, $attiributes = [])
{
    extract($attiributes);
    return  base_path('views/' . $path);
}
