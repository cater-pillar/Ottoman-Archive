<?php

namespace App\Core;

class Request {

    public static function uri() {


        return $uri = substr(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 9); // CHANGE HERE!
    }

    public static function method() {
      return $_SERVER['REQUEST_METHOD'];
    }
}