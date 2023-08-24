<?php
$emailXXX = $_POST["email"];
$fname = $_POST["fullname"];
$agg = $_POST["age"];

//$_GET["email"]

//echo "Đã nhận hàng có email là: ".$emailXXX;
// xử lý dữ liệu nhận được....

// quay trở về trang danh sách
header("Location: students.php");