<?php
    global $connection;
    include './configurations/database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Tìm email xem có hay không
    // Nếu có thì báoL tài khoản hoặc mật khẩu không đúng
    $sql_check = "select * from users where email = '$email' limit 1";
    $result = $connection->query($sql_check);
    if ($result->num_rows > 0) {
        die("Tài khoản hoặc mật khẩu không đúng!");
    }
    $user = $result->fetch_assoc();
    // 2. Compare password
?>