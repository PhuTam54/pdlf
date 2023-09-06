<?php
    $fruits = ['Apple', 'Mango', 'Avocado'];
    foreach ($fruits as $index => $fruit) {
        echo "$index - $fruit <br>";
    }

    $students = [
        'full_name' => 'Nguyen Phu Tam 1',
        'age' => 19,
        'email' => 'phutamytb@gmail.com'
    ];
    foreach ($students as $key => $value) {
        echo "$key : $value <br>";
    }
?>