<?php
    require '../components/header.php';
    include '../components/nav.php';
    global $connection;
    $name = $email = $password = '';
    $name_error = $email_error = $password_error = '';
    if(isset($_POST['submit'])) {
        //validations
//        if(empty($_POST['email'])) {
//            $email_error = 'Email is required';
//        } else {
//            $email = filter_input(INPUT_POST, 'email',
//                FILTER_SANITIZE_EMAIL);
//            echo $email.' - ';
//        }
        echo $_POST['old_password'];
        if(empty($_POST['old_password'])) {
            $old_password_error = 'Old Password is required';
        } else {
            $old_password = filter_input(INPUT_POST, 'old_password',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            echo $password;
        }
        echo $_POST['new_password'];
        if(empty($_POST['new_password'])) {
            $new_password_error = 'New Password is required';
        } else {
            $new_password = filter_input(INPUT_POST, 'new_password',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            echo $password;
        }
        $validate_success = empty($old_password_error)
//            && empty($email_error)
            && empty($new_password_error);
        if($validate_success) {
            try {
                // kiểm tra tài khoản đã có hay chưa?
                $password = $_SESSION['auth']['password'];
                $email = $_SESSION['auth']['email'];
                // 2. Compare password
                $verify = password_verify($old_password, $password);
                if ($password == $verify) {
                    // Nếu đã có tài khoản thì hash password
                    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                    $sql = "update users set name = '$name', email = '$email', password = '$hashed_password' where email = '$email'";
                    $connection->query($sql);
                }
                echo "Password change successfully";
                header("Location: ../product/product.php");
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
            <h1 class="text-center">Changing password</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                  method="post" >
<!--                <div class="mb-3 form-group">-->
<!--                    <label for="email" class="form-label">Email</label>-->
<!--                    <input type="email" class="form-control --><?php //echo $email_error ? 'is-invalid' : ''; ?><!--"-->
<!--                           name="email" placeholder="Enter your email"-->
<!--                    >-->
<!--                    <p class="text-danger">-->
<!--                        --><?php //echo $email_error; ?>
<!--                    </p>-->
<!--                </div>-->
                <div class="mb-3 form-group">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control <?php echo $password_error ? 'is-invalid' : ''; ?>"
                           name="old_password" placeholder="Enter your old password"
                    >
                    <p class="text-danger">
                        <?php echo $password_error; ?>
                    </p>
                </div>
                <div class="mb-3 form-group">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control <?php echo $password_error ? 'is-invalid' : ''; ?>"
                           name="new_password" placeholder="Enter your new password"
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