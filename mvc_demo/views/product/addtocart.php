<?php
include_once ("configurations/database.php");
$conn = connect();
$id= $_GET["id"];
$sql = "select * from products where id = $id limit 1";
$result = $conn->query($sql);
if($result->num_rows == 0){
    die("404 not found!");
}
$product = $result->fetch_assoc();

$cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
// kiem tra san pham da co trong gio hang hay chua?
$flag = -1;
foreach ($cart as $key=>$item){
    if($item["id"] == $product["id"]){
        $flag = $key;
        break;
    }
}
if($flag>=0){
    $cart[$flag]["buy_qty"] = $cart[$flag]["buy_qty"] +1;
}else{
    $product["buy_qty"] = 1;
    $cart[] = $product;
}

$_SESSION["cart"]= $cart;

header("Location: list.php");
?>