<?php
    $id = $_GET["id"];

// get categories from db
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
// Slug
    function slugify($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
// 2. query
    $sql = "select * from categories where id = '$id'"; // 0 | 1
    $result = $conn->query($sql);
    $categories = null;
    if ($result->num_rows > 0) {
        $new_name = $_POST["name"];
        $str = $new_name;
        $new_slug = slugify($str);
        echo $new_slug;
        $update_sql = "update categories set name='$new_name', slug='$new_slug' where id= '$id'";
        $conn->query($update_sql);
        // quay trở về trang danh sách
        header("Location: categories.php");
    } else {
        die('404 not found');
    }
?>