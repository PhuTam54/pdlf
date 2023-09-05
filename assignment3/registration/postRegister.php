<?php
    $name = $email = $password = '';
    $name_error = $email_error = $password_error = '';
    if(isset($_POST['submit'])) {
        //validations
        if(empty($_POST['name'])) {
            $name_error = 'Name is required';
        } else {
            $name = htmlspecialchars($_POST['name']);
            echo $name.' - ';
        }
        if(empty($_POST['email'])) {
            $email_error = 'Email is required';
        } else {
            $email = filter_input(INPUT_POST, 'email',
                FILTER_SANITIZE_EMAIL);
            echo $email.' - ';
        }
        echo $_POST['password'];
        if(empty($_POST['password'])) {
            $password_error = 'Password is required';
        } else {
            $password = filter_input(INPUT_POST, 'password',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            echo $password;
        }
        $validate_success = empty($name_error)
            && empty($email_error)
            && empty($password_error);
        if($validate_success) {

        try {
            // kiểm tra email đã có hay chưa?
            $sql_check = "Select * from users where email = '$email'";
            if ($conn->query($sql_check)->num_rows > 0) {
                die("Email  is existed!");
            }
            // Nếu email chưa đk thì hash password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "insert into users(name, email, password) values ('$name', '$email', '$hashed_password')";
            $conn->query($sql);

            echo "User inserted successfully";
            header("Location: postLogin.php");
        }catch(PDOException $e) {
            echo "Cannot insert feedback into database"
                .$e->getMessage();
                }


    //            $sql = "INSERT INTO feedbacks(name, email, password) VALUES(?, ?, ?)";
    //            try {
    //                $statement = $connection->prepare($sql);
    //                $statement->bindParam(1, $name);
    //                $statement->bindParam(2, $email);
    //                $statement->bindParam(3, $password);
    //                $statement->execute();
    //                echo "feedbacks inserted successfully";
    //                header("Location: feedback_list.php");
    //            }catch(PDOException $e) {
    //                echo "Cannot insert feedback into database"
    //                    .$e->getMessage();
    //            }
        }
    }
?>