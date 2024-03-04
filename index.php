<?php
$routes = [
    '/' => './views/login.php',
    '/signup' => './views/signup.php'
];

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($url, $routes)) {
    include $routes[$url];
}
?>