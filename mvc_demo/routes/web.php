<?php
    require_once ("./controllers/ProductController.php");

    $page = isset($_GET["page"])?$_GET["page"]:"/";

    switch ($page){
        case "product":{
            $productCtrl = new controllers\ProductController();
            $productCtrl->action();
            break;
        }
        default: die("404 Not Found");
    }
?>