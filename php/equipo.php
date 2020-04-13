<?php

function getEquipo()
{
    $mysqli = (new database)->connect();
    $sql = "select * from equipo;";
    $res = $mysqli->query($sql);
    if ($res->num_rows == 0) {
        return;
    }
    $echo = array();
    while ($row = $res->fetch_assoc()) {
        array_push($echo, $row);
    }
    echo json_encode($echo);
}

function postEquipo()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into equipo (name,email,phone,experience,avatar) values('$json->name','$json->email','$json->phone','$json->experience', '$json->avatar');";
    echo $mysqli->query($sql);
}

function putEquipo()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "update equipo set name = '$json->name',email = '$json->email',phone = '$json->phone',experience = '$json->experience', avatar = '$json->avatar' where id = '$json->id';";
    echo $mysqli->query($sql);
}

function deleteEquipo()
{
    $mysqli = (new database)->connect();
    $sql = "delete from equipo where id = '${_GET['id']}';";
    echo $mysqli->query($sql);
}