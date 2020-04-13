<?php
require('database.php');
require('php/equipo.php');
require('php/user.php');

$paths_full = explode('?', $_SERVER['REQUEST_URI']);
$paths = explode('/', $paths_full[0]);
if (count($paths) < 3 || $paths[1] != 'router.php') {
    return;
}
//var_dump($paths_full);
//var_dump($paths);

switch ($paths[2]) {
    case 'login':
        login();
        break;
    case 'register':
        register();
        break;
    case 'email':
        email();
        break;
    case 'equipo':
//        var_dump($_SERVER['REQUEST_METHOD']);
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                getEquipo();
                break;
            case 'POST':
                postEquipo();
                break;
            case 'PUT':
                putEquipo();
                break;
            case 'DELETE':
                deleteEquipo();
                break;
            default:
                throw new \Exception('Unexpected method: ' . $_SERVER['REQUEST_METHOD']);
        }
        break;
    default:
        throw new \Exception('Unexpected paths: ' . $paths[2]);
}
