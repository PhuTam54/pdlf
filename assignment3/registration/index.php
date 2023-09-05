<?php
require '../components/header.php';
    global $connection;
    include '../components/nav.php';
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
                if ($connection->query($sql_check)->num_rows > 0) {
                    die("Email  is existed!");
                }
                // Nếu email chưa đk thì hash password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "insert into users(name, email, password) values ('$name', '$email', '$hashed_password')";
                $connection->query($sql);

                echo "User inserted successfully";
                header("Location: ./product/product.php");
            } catch (PDOException $e) {
                echo "Cannot insert feedback into database"
                    . $e->getMessage();
            }
        }
    }
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6 col-xs-12 row-container">
            <h1 class="text-center">Registration</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  method="post" >
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Full name</label>
                    <input type="text" class="form-control <?php echo $name_error ? 'is-invalid' : ''; ?>"
                           name="name" placeholder="What is your name ?"
                    >
                    <p class="text-danger">
                        <?php echo $name_error; ?>
                    </p>
                </div>
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?php echo $email_error ? 'is-invalid' : ''; ?>"
                           name="email" placeholder="Enter your email"
                    >
                    <p class="text-danger">
                        <?php echo $email_error; ?>
                    </p>
                </div>
                <div class="mb-3 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?php echo $password_error ? 'is-invalid' : ''; ?>"
                           name="password" placeholder="Enter your password"
                    >
                    <p class="text-danger">
                        <?php echo $password_error; ?>
                    </p>
                </div>
                <div class="mb-3">
                    <input type="submit"
                           class="btn btn-primary"
                           name="submit" value="Submit"
                    >
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include '../components/footer.php';
?>
