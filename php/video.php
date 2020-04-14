<?php

function getVideo()
{
    $mysqli = (new database)->connect();
    $sql = "select * from video;";
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

function postVideo()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into video (author,description,url) values('$json->author','$json->description','$json->url');";
    echo $mysqli->query($sql);
}

function putVideo()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "update video set author = '$json->author',description = '$json->description',url = '$json->url' where id = '$json->id';";
    var_dump($sql);
    var_dump($json);
    echo $mysqli->query($sql);
}

function deleteVideo()
{
    $mysqli = (new database)->connect();
    $sql = "delete from video where id = '${_GET['id']}';";
    echo $mysqli->query($sql);
}