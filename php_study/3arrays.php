<?php
    $fruits = ['Apple', 'Mango', 'Avocado'];
    print_r($fruits);
    echo '<br/>';
    var_dump($fruits);
    echo '<br/>';
    echo $fruits[0];
    echo '<br/>';

    // associative array
    $colors = [ // key - value
        1 => 'red',
        2 => 'green',
        3 => 'blue'
    ];
    echo $colors[1];
    echo '<br/>';

    // key as a string
    $hex_color = [
        'red' => '#FF0000',
        'green' => '#00FF00'
    ];
    echo $hex_color['red'];
    echo '<br/>';

    $student = [
        'full_name' => 'Nguyen Phu Tam',
        'age' => 19,
        'email' => 'phutamytb@gmail.com'
    ];
    print_r($student);
    echo $student['email'];
    echo '<br/>';

    $students = [
        [
            'full_name' => 'Nguyen Phu Tam 1',
            'age' => 19,
            'email' => 'phutamytb@gmail.com'
        ],
        [
            'full_name' => 'Nguyen Phu Tam 2',
            'age' => 19,
            'email' => 'phutamytb@gmail.com'
        ],
        [
            'full_name' => 'Nguyen Phu Tam 3',
            'age' => 19,
            'email' => 'phutamytb@gmail.com'
        ]
    ];
    echo $students[2]['age'];
    echo '<br/>';

    var_dump(json_encode($students));
?>
