<?php
spl_autoload_register(static function ($class) {
    $array = explode('\\', $class);
    require_once __DIR__ . "/App/" . end($array) . ".php";
});