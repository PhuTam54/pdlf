<?php

namespace models;
    include_once ("configurations/database.php");

class Product
{
    protected $table = "products";
    protected $primaryKey = "id";
    public $name;
    public $price;
    public $description;
    public $qty;

    public function all(){
        $sql = "select * from $this->table";
        $conn = connect();
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $p = new Product();
            $p->id = $row["id"];
            $p->name = $row["name"];
            $p->price = $row["price"];
            $p->description = $row["description"];
            $p->qty = $row["qty"];
            $data [] = $p;
        }
        return $data;
    }

    public function store($data){
        $name = $data["name"];
        $price = $data["price"];
        $qty = $data["qty"];
        $description = $data["description"];
        $sql = "insert into $this->table(name,price,qty,description)
                values('$name','$price','$qty','$description')";
        $conn = connect();
        $conn->query($sql);
        return true;
    }

    public function update($data){
        $id = $data["id"];
        $sql = "select * from $this->table where id = '$id'"; // 0 | 1
        $conn = connect();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $name = $data["name"];
            $price = $data["price"];
            $qty = $data["qty"];
            $description = $data["description"];
            $update_sql = "update $this->table set name='$name', price='$price', description='$description', qty='$qty' 
                            where id= '$id'";
            $conn->query($update_sql);
        } else {
            die('404 Not Found');
        }
        return true;
    }
}