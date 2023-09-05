<?php
$id = $_GET["id"];

// get product from db
// 1.connect
$host = 'localhost';
$dbname = 'php';
$dbuser = 'root';
$dbpassword = '';

$conn = new mysqli($host, $dbuser, $dbpassword, $dbname); // host user pass dbname
if ($conn->connect_error) {
    die("Connection refused");
}
// connection succeed
// 2. query
$sql = "select * from product where id = '$id'"; // 0 | 1
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $delete_sql =
        "delete from product where id= '$id'";
    $conn->query($delete_sql);
    // quay trở về trang danh sách
    header("Location: product.php");
} else {
    die('404 not found');
}
?>