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
// 2. query
    $sql = "select * from categories where id = '$id'"; // 0 | 1
    $result = $conn->query($sql);
    $categories = null;
    if ($result->num_rows > 0) {
        $categories = $result->fetch_assoc();
    } else {
        die('404 not found');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <?php include("../components/head.php"); ?>
</head>
<body>
    <?php include("../components/nav.php"); ?>
    <div class="container">
        <form
            action="update.php?id=<?php echo $id; ?>"
            method="post"
        >
            <div class="mb-3">
                <label for="name" class="form-label">Product name</label>
                <input name="name" type="categoriesName" value="<?php echo $categories['name'] ?>" class="form-control" id="name" aria-describedby="categoriesNameHelp">
                <div id="categoriesNameHelp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>