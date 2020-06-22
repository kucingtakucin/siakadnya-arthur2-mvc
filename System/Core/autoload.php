<?php
define("BASE_URL", "http://{$_SERVER['SERVER_NAME']}{$_SERVER['CONTEXT_PREFIX']}");

spl_autoload_register(static function ($class) {
    $array = explode('\\', $class);
    require_once __DIR__ . "/App/" . end($array) . ".php";
});