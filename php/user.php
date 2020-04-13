<?php
require('baseResponse.php');

function login()
{
    $response = new baseResponse;

    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "select * from user where username='$json->username' or email='$json->username' limit 1;";
    $res = $mysqli->query($sql);
    if ($res->num_rows == 0) {

        $response->setCode(-1);
        $response->setRes("The username or email is not exited!");
        echo json_encode($response);
        return;
    }

    $row = $res->fetch_assoc();
//    var_dump($row);
    if($json->password == $row["password"]) {
        $response->setCode(0);
        $response->setRes($row);
        echo json_encode($response);
    } else {
        $response->setCode(-1);
        $response->setRes("The password is wrong");
        echo json_encode($response);
    }
}

function register()
{
    $mysqli = (new database)->connect();
    $json = json_decode(file_get_contents('php://input'));
    $sql = "insert into user (username,password,email,address,role) values('$json->username','$json->password','$json->email','$json->address','user');";
    $mysqli->query($sql);
    $id = $mysqli->insert_id;

    $sql = "select * from user where id = $id;";
    $res = $mysqli->query($sql);
    $row = $res->fetch_assoc();
    echo json_encode($row);
}
