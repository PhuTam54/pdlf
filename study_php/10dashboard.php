<?php
    session_start();
    if (isset($_SESSION['email'])) {
        echo "Welcome to Dashboard page <br>";
        echo "Email: " .$_SESSION['email'];
        echo "<a href='10logout.php'>Logout</a>";
    } else {
        echo 'Welcome guest to Dashboard <br>';
        echo "<a href='10sessions.php'>Back to Log in</a>";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard page</h1>
</body>
</html>