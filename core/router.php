<?php
$uri = trim($_SERVER['REQUEST_URI'], '/');

if ($uri === '') {
    $array = explode('|', $routes['home']);
} else {
    if (isset($array[$uri])) {
        $array = explode('|', $routes[$uri]);
    } else {
        $array = explode('|', $routes['error']);
    }
}

$file = 'core/controllers/' . $array[0] . '.php';
$class = $array[0];
$method = $array[1];

if (file_exists($file)) {
    require $file;

    if (class_exists($class) && method_exists($class, $method)) {
        $n = new $class;
        $n->$method();
    } else {
        die('Class or method not found');
    }

} else {
    die('Controller not found');
}