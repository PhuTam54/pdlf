<?php
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $qty = $_POST["qty"];

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
    $sql = "insert into products(name, price, description, qty) values ('$name', '$price', '$description', $qty)";
    $conn->query($sql);
// quay trở về trang danh sách
    header("Location: products.php");
?>


