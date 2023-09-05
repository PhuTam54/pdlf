<?php
    $id = $_GET["id"];

// get product from db
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
    $sql = "select * from product where id = '$id'"; // 0 | 1
    $result = $conn->query($sql);
    $product = null;
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
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
                <input name="name" type="productName" value="<?php echo $product['name'] ?>" class="form-control" id="name" aria-describedby="productNameHelp">
                <div id="productNameHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input name="price" type="number" value="<?php echo $product['price'] ?>" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input name="description" type="text" value="<?php echo $product['description'] ?>" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Qty</label>
                <input name="qty" type="number" value="<?php echo $product['qty'] ?>" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>