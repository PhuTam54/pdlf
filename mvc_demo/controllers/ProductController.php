<?php

namespace controllers;

use models\Product;

include_once ("models/Product.php");
class ProductController
{
    public function action(){
        $action = isset($_GET["action"])?$_GET["action"]:"/";
        $id = isset($_GET["id"])?$_GET["id"]:1;
        switch ($action){
            case "/": return $this->listProducts();
            case "create": return $this->create();
            case "save": return $this->save();
            case "edit?id=$id": return $this->edit($id);
            case "update": return $this->update();
            case "delete": return $this->delete();
            case "addtocart": return $this->addToCart();
            default: die("404 Not Found");
        }
    }

    public function listProducts(){
        $productObj = new Product();
        $products = $productObj->all();
        include_once ("views/product/list.php");
    }

    public function create(){
        include_once ("views/product/create.php");
    }

    public function save(){
        $productObj = new Product();
        $products = $productObj->store($_POST);
        header("Location: index.php?page=product");
    }

    public function edit($id){
        include_once ("views/product/edit.php");
    }

    public function update(){
        $productObj = new Product();
        $products = $productObj->update($_POST);
        header("Location: index.php?page=product");
    }

    public function delete(){

    }

    public function addToCart(){

    }
}