<?php

function getProject()
{
    $mysqli = (new database)->connect();
    $sql = "select * from project;";
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

function postProject()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into project (title,subtitle,content,Propósito,Valores,Métodos,Investigación,Asociación,Diálogo) values('$json->title','$json->subtitle','$json->content','$json->Propósito','$json->Valores','$json->Métodos','$json->Investigación','$json->Asociación','$json->Diálogo');";
    echo $mysqli->query($sql);
}

function putProject()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "update project set title = '$json->title',subtitle = '$json->subtitle',content = '$json->content',Propósito = '$json->Propósito', Valores = '$json->Valores', Métodos = '$json->Métodos', Investigación = '$json->Investigación', Asociación = '$json->Asociación', Diálogo = '$json->Diálogo' where id = '$json->id';";
    var_dump($sql);
    var_dump($json);
    echo $mysqli->query($sql);
}

function deleteProject()
{
    $mysqli = (new database)->connect();
    $sql = "delete from project where id = '${_GET['id']}';";
    echo $mysqli->query($sql);
}