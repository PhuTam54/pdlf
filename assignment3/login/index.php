<?php
    global $name_error, $email_error, $password_error, $connection;
    require '../components/header.php';
    include '../components/nav.php';

    if(isset($_POST['submit'])) {
        //validations
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            // 1. Tìm email xem có hay không
            // Nếu có thì báoL tài khoản hoặc mật khẩu không đúng
            $sql_check = "select * from users where email = '$email' limit 1";
            $result = $connection->query($sql_check);
            if ($result->num_rows > 0) {
                die("Tài khoản hoặc mật khẩu không đúng!");
            }
            $user = $result->fetch();
            // 2. Compare password
            $verify = password_verify($password, $user['password']);
            if ($verify) {
                $_SESSION['auth'] = $user;
                // redirect to another page
                echo "OK con de";
                header('Location: ../product/product.php');
            } else {
                die('Tài khoản hoặc mật khẩu không đúng!');
            }
        } catch (PDOException $e) {
            echo "Cannot login into database"
                . $e->getMessage();
        }
    }
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6 col-xs-12 row-container">
            <h1 class="text-center">Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  method="post" >
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
