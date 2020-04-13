<?php
require('baseResponse.php');
require('PHPMailer-5.2-stable\PHPMailerAutoload.php');

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
    email($row['email'],$row['username']);
    echo json_encode($row);
}

function email($email, $username) {
    $mail = new PHPMailer;

//    $mail->SMTPDebug = 3; // Enable verbose debug output

    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.qq.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = '2189080041@qq.com'; // SMTP username
    $mail->Password = 'kqdiznkziudmeccj'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    $mail->setFrom('2189080041@qq.com', 'xxh8517.uta.cloud');
    $mail->addAddress($email, $username);

    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = 'Register-xxh8517.uta.cloud';
    $mail->Body = 'Hi,'.$username.'<br>Congratulations! Your registration is successful.';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
