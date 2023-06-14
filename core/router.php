<?php
$uri = trim($_SERVER['REQUEST_URI'], '/');

if ($uri === '') {
    $array = explode('|', $routes['home']);
} else {
    if (isset($routes[$uri])) {
        $array = explode('|', $routes[$uri]);
    } else {
        $array = explode('|', $routes['error']);
        Container::monolog("Обращение по не существуеpему URI $uri c IP $_SERVER[REMOTE_ADDR]");
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
        Container::monolog('Class or method not found');
        die('Class or method not found');
    }

} else {
    Container::monolog('Controller not found');
    die('Controller not found');
}