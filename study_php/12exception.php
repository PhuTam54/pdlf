<?php
    echo "Exceptions in PHP<br>";
    function divide($a, $b) {
        if(!$b) {
            throw new Exception("Cannot divide by zero<br>");
        }
        return $a / $b;
    }
    //echo divide(5, 0);
    try {
        echo divide(10, 0).'<br>';
        //echo divide(5, 0);
        echo "no errors<br>";
    }catch(Exception $e) {
        echo "Caught exception: " . $e->getMessage() . "\n";
    } finally {
        echo "Finally come here...<br>";
    }
    echo "Program runs here...<br>";
?>