<?php
require('database.php');
$paths = explode('/', $_SERVER['REQUEST_URI']);
if (count($paths) < 3 || $paths[1] != 'router.php') {
    return;
}
//var_dump($paths);

switch ($paths[2]) {
    case 'login':
        login();
        break;
    case 'register':
        register();
        break;
    default:
        throw new \Exception('Unexpected value');
}

function login()
{
    $mysqli = (new database)->connect();
    $sql = "select * from user where username='${_POST['username']}' limit 1;";
    $res = $mysqli->query($sql);
    if ($res->num_rows == 0) {
        return;
    }

    $row = $res->fetch_assoc();
//    var_dump($row);
    if ($_POST['password'] == $row["password"]) {
        echo json_encode($row);
    } else {
        echo 'failed';
    }
}

function register()
{
    $mysqli = (new database)->connect();
    $sql = "insert into user (username,password,email,phone) values('${_POST['username']}','${_POST['password']}','${_POST['email']}','${_POST['phone']}');";
    $res = $mysqli->query($sql);
    if ($res) {
        echo 'successful';
    } else {
        echo 'failed';
    }
}