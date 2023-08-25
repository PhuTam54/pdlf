<?php
    $y = 19;
    function sayHello($name = '') {   // argument 'name'
        // default argument
        global $y;
        echo $y;
        echo "Hello $name";
    }
    sayHello("Phu Tam");  // parameters 'Phu Tam'

    echo '<br>';
    // assign a variable to a function
    $multiply = function ($a, $b) {
        return $a * $b;
    };
    echo $multiply(1, 2);

    echo '<br>';
    // arrow function
    $substract = fn($a, $b) => $a - $b;
    echo $substract(5, 4);
    echo '<br>';

    // built-in function for array
    $fruits = ['Apple', 'Mango', 'Avocado'];
    echo count($fruits);
    echo '<br>';

    // search ínside array
    var_dump(in_array('Avocado', $fruits));
    echo '<br>';

    // insert an item
    array_push($fruits, 'Water melon', 'Dragon fruit');
//    print_r($fruits);
    echo '<br>';
    // remove an item
    array_pop($fruits);
//    print_r($fruits);
    echo '<br>';

    // insert an item to the beginning of the array
    array_unshift($fruits, 'Water melon', 'Dragon fruit');
//    print_r($fruits);
    echo '<br>';

    // remove the first item
    array_shift($fruits);
//    print_r($fruits);
    echo '<br>';

    // chunk an array
    $chunked_array = array_chunk($fruits, 3);
//    print_r($chunked_array);
    echo '<br>';

    // merge array
    $merged_array = array_merge($fruits, $chunked_array);
//    print_r($merged_array);
    echo '<br>';

    // spread operator
    $spread_array = [...$merged_array]; // Clone an array

    // merge and clone
    $merge_and_clone = [...$fruits, ...$chunked_array];

    // combine 2 arrays
    $key = ['name', 'age'];
    $value = ['Tam', 19];
    $combined_array = array_combine($key, $value);
//    print_r($combined_array);
//    print_r(array_keys($combined_array));
//    print_r(array_values($combined_array));

    // array_flip

    // range(0, 9) ...
    $numbers = range(0, 10);
    print_r($numbers);
    echo '<br>';

    // map an array to another array with the same size, but other values
    // ánh xạ
    $squared_numbers = array_map(
        fn($each_number) => $each_number * $each_number,
        $numbers);
//    $squared_numbers = array_map(
//        function($each_number) {
//            return $each_number * $each_number;
//        },
//    $numbers);
    print_r($squared_numbers);
    echo '<br>';

    // filter an array
    $filtered_array = array_filter(
        $numbers,
        fn($each_number) => $each_number % 2 == 0);
    print_r($filtered_array);
?>