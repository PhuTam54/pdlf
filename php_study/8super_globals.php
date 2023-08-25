<?php
//    print_r($_SERVER);
//    print_r($_GET);
//    print_r($_POST);
    /*
    if (isset($_GET['name'])) {
        echo $_GET['name'];
    }
    if (isset($_GET['age'])) {
        echo $_GET['age'];
    }
    */

    $email = htmlspecialchars($_POST['email']) ?? ''; // coalescing
    $age = htmlspecialchars($_POST['password']) ?? ''; // coalescing
    echo $email;
    echo '<br>';
    echo $age;
?>

<<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supper global</title>
</head>
<body>
    <form
        action="<?php echo $_SERVER['PHP_SELF']; ?>"
        method="post"
<!--        method="get"-->
    >
        <div>
            <label for="email">Your Email:</label> <br>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password:</label> <br>
            <input type="password" name="password">
        </div>
<!--    <div>-->
<!--        <label for="name">Your name:</label> <br>-->
<!--        <input type="text" name="name">-->
<!--    </div>-->
<!--    <div>-->
<!--        <label for="age">Age:</label>-->
<!--        <input type="text" name="age">-->
<!--    </div>-->
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
