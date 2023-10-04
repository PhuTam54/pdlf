<?php

namespace models;
    use AllowDynamicProperties;

    include_once ("configurations/database.php");

#[AllowDynamicProperties] class Student
{
    protected $table = "students";
    protected $primaryKey = "id";
    public $name;
    public $age;
    public $address;
    public $telephone;

    public function all(){
        $sql = "select * from $this->table";
        $conn = connect();
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $stu = new Student();
            $stu->id = $row["id"];
            $stu->name = $row["name"];
            $stu->age = $row["age"];
            $stu->address = $row["address"];
            $stu->telephone = $row["telephone"];
            $data [] = $stu;
        }
        return $data;
    }

    public function store($data){
        $name = $data["name"];
        $age = $data["age"];
        $address = $data["address"];
        $telephone = $data["telephone"];
        $sql = "insert into $this->table(name,age,address,telephone)
                values('$name','$age','$address','$telephone')";
        $conn = connect();
        $conn->query($sql);
        return true;
    }
}