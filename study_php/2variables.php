<?php
    echo "1234, 231";
    $name = "Phu Tam";
    $age = 19;
    echo "<br/>$name $age<br/>";
    $has_mercedes = true;
    echo $has_mercedes;
    echo "<br/>";
    var_dump($has_mercedes);
    $sum = '2' + '3';
    echo "<br/>";
    var_dump($sum);
    echo "<br/>";

    // Constance
    define("SERVER_NAME", 'localhost');
    define('DATABASE_NAME', 'mydb');

    echo "server: ", SERVER_NAME, "<br/>database: ", DATABASE_NAME;
?>
