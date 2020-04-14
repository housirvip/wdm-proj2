<?php

function getEvent()
{
    $mysqli = (new database)->connect();
    $sql = "select * from event;";
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

function postEvent()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into event (title,content,image_url) values('$json->title','$json->content','$json->image_url');";
    echo $mysqli->query($sql);
}

function putEvent()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "update event set title = '$json->title',content = '$json->content',image_url = '$json->image_url' where id = '$json->id';";
    echo $mysqli->query($sql);
}

function deleteEvent()
{
    $mysqli = (new database)->connect();
    $sql = "delete from event where id = '${_GET['id']}';";
    echo $mysqli->query($sql);
}