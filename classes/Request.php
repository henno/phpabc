<?php

class Request
{

    static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    static function endpoint()
    {
        $endpoint = explode("/", substr(@$_SERVER['REQUEST_URI'], 1));
        array_shift($endpoint);
        return implode('/', $endpoint);

    }

    static function body()
    {
        $body = file_get_contents('php://input');
        return json_decode($body);
    }
}
