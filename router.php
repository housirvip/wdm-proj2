<?php
require('database.php');
require('php/equipo.php');
require('php/user.php');
require('php/video.php');
require('php/project.php');
require('php/event.php');

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
    case 'event':
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                getEvent();
                break;
            case 'POST':
                postEvent();
                break;
            case 'PUT':
                putEvent();
                break;
            case 'DELETE':
                deleteEvent();
                break;
            default:
                throw new \Exception('Unexpected method: ' . $_SERVER['REQUEST_METHOD']);
        }
        break;
    case 'video':
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                getVideo();
                break;
            case 'POST':
                postVideo();
                break;
            case 'PUT':
                putVideo();
                break;
            case 'DELETE':
                deleteVideo();
                break;
            default:
                throw new \Exception('Unexpected method: ' . $_SERVER['REQUEST_METHOD']);
        }
        break;
    case 'project':
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                getProject();
                break;
            case 'POST':
                postProject();
                break;
            case 'PUT':
                putProject();
                break;
            case 'DELETE':
                deleteProject();
                break;
            default:
                throw new \Exception('Unexpected method: ' . $_SERVER['REQUEST_METHOD']);
        }
        break;
    default:
        throw new \Exception('Unexpected paths: ' . $paths[2]);
}
