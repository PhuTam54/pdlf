<?php
    session_start();
    session_destroy();
    header('Location: ../product/product.php');
?>