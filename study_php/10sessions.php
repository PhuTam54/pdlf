<?php
    /*
     *  Session are stored in the server
     * so it can be used across multiple pages
     */

    session_start();
    if (isset($_POST['submit'])) {
        $email = filter_var($_POST['email'],
            FILTER_SANITIZE_SPECIAL_CHARS);
        $password = htmlspecialchars($_POST['password']) ?? '';
        if ($email == 'phutamytb@gmail.com' && $password == '123456') {
            $_SESSION['email'] = $email;
            // redirect to another page
            header('Location: ./10dashboard.php');
        } else {
            echo 'Incorrect email/password';
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session in PHP</title>
</head>
<body>
    <h1>Login</h1>
    <form
        action="<?php echo $_SERVER['PHP_SELF']; ?>"
        method="post"
    >
        <div>
            <label for="email">Your Email:</label> <br>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password:</label> <br>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
