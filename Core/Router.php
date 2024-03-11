<?php

namespace Core;

class Router
{

    protected $routers = [];

    public function add($methed, $uri, $controller)
    {

        $this->routers[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $methed,
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }
    public function route($uri, $methed)
    {
        foreach ($this->routers as $router) {
            if ($router['uri'] === $uri && $router['method'] === $methed) {
                return require base_path($router['controller']);
            }
        }
        $this->abort();
    }
    function abort()
    {
        http_response_code(404);
        include views("/404.php");
    }
}
