<?php
    require_once ("./controllers/StudentController.php");

    $page = $_GET["page"] ?? "/";

    switch ($page){
        case "student":{
            $productCtrl = new controllers\StudentController();
            $productCtrl->action();
            break;
        }
        default: 
            $productCtrl = new controllers\StudentController();
            $productCtrl->action();
            break;;
    }
?>