<?php
global $conn;
require 'components/header.php';
    $id = $_GET["id"];
    $sql = "select * from products where id = '$id'"; // 0 | 1
    $result = $conn->query($sql);
    $product = null;
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die('404 not found');
    }
?>
    <div class="container">
        <form
            action="?page=product&action=update?id=<?php echo $id; ?>"
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
<?php
    include "components/footer.php"
?>