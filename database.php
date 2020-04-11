<?php

class database
{
    /**
     * @var array
     */
    private static array $mysql_conf = array(
        'host' => '127.0.0.1:3306',
        'db' => 'mijares',
        'db_user' => 'root',
        'db_pwd' => 'housirvip',
    );

    private static $mysqli = null;

    function connect(): mysqli
    {
        if (self::$mysqli !== null && !mysqli_connect_error()) {
            return self::$mysqli;
        }

        $mysqli = new mysqli(self::$mysql_conf['host'], self::$mysql_conf['db_user'], self::$mysql_conf['db_pwd']);
        if ($mysqli->connect_errno) {
            die("could not connect to the database:\n" . $mysqli->connect_error);
        }
        $mysqli->query("set names 'utf8';");
        $select_db = $mysqli->select_db(self::$mysql_conf['db']);
        if (!$select_db) {
            die("could not connect to the db:\n" . $mysqli->error);
        }

        self::$mysqli = $mysqli;
        return $mysqli;
    }
}
//$mysqli = (new database)->connect();
//$sql = "select * from user;";
//$res = $mysqli->query($sql);
//if (!$res) {
//    die("sql error:\n" . $mysqli->error);
//}
//while ($row = $res->fetch_assoc()) {
//    var_dump($row);
//}
//
//$res->free();
//$mysqli->close();