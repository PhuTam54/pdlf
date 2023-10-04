<?php

namespace controllers;

use models\Student;

include_once ("models/Student.php");
class StudentController
{
    public function action(){
        $action = $_GET["action"] ?? "/";
        switch ($action){
            case "/": return $this->listStudents();
            case "create": return $this->create();
            case "save": return $this->save();
            default: die("404 Not Found action");
        }
    }

    public function listStudents(){
        $studentObj = new Student();
        $students = $studentObj->all();
        include_once ("views/student/list.php");
    }

    public function create(){
        include_once ("views/student/create.php");
    }

    public function save(){
        $studentObj = new Student();
        $studentObj->store($_POST);
        header("Location: index.php?page=student");
    }
}