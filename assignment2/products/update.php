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
    $sql = "select * from products where id = '$id'"; // 0 | 1
    $result = $conn->query($sql);
    $product = null;
    if ($result->num_rows > 0) {
        $new_name = $_POST["name"];
        $new_price = $_POST["price"];
        $new_description = $_POST["description"];
        $new_qty = $_POST["qty"];
        $update_sql =
            "update products set name='$new_name', price='$new_price', description='$new_description', qty='$new_qty' 
            where id= '$id'";
        $conn->query($update_sql);
        // quay trở về trang danh sách
        header("Location: products.php");
    } else {
        die('404 not found');
    }
?>