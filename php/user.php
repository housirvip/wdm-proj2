<?php

function login()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "select * from user where username='$json->username' limit 1;";
    $res = $mysqli->query($sql);
    if ($res->num_rows == 0) {
        return;
    }

    $row = $res->fetch_assoc();
//    var_dump($row);
    echo $_POST['password'] == $row["password"] ? json_encode($row) : '';
}

function register()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into user (username,password,email,direction) values('$json->username','$json->password','$json->email','$json->direction');";
    echo $mysqli->query($sql);
}
