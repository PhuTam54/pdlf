<?php
// 1.connect
function connect()
{
    $host = 'localhost';
    $dbname = 'php_final_exam';
    $dbuser = 'root';
    $dbpassword = '';

    $conn = new mysqli($host, $dbuser, $dbpassword, $dbname); // host user pass dbname
    if ($conn->connect_error) {
        die("Connection refused");
    }
    return $conn;
}
?>