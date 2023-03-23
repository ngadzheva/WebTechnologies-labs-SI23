<?php
    $name = 'Nevena';

    function greeting() {
        // global $name;

        if (true) {
            $a = 5;
        }

        echo $a;
        echo "Hello, $name";
    }

    // echo $a;

    greeting();

    echo "<br/>";

    function sum($a, $b, $c = null, $d = 8) {
        echo $a + $b + $c;
    }

    sum(1, 2);

    $numbers = [1, 5, 8, 9, 6];
    echo "<br>";

    print_r($numbers);
    echo "<br>";

    var_dump($numbers);
    echo "<br>";

    $numbers[0];
    $numbers[] = 10;

    print_r($numbers);
    echo "<br>";

    array_push($numbers, 7);
    print_r($numbers);
    echo "<br>";

    array_pop($numbers);
    print_r($numbers);
    echo "<br>";

    array_unshift($numbers, 8);
    print_r($numbers);
    echo "<br>";

    array_shift($numbers);
    print_r($numbers);
    echo "<br>";

    array_splice($numbers, 2, 2);
    print_r($numbers);
    echo "<br>";

    array_splice($numbers, 1, 0, 4);
    print_r($numbers);
    echo "<br>";

    array_splice($numbers, 3, 1, 8);
    print_r($numbers);
    echo "<br>";

    array_splice($numbers, 2, 0, [5, 7, 9]);
    print_r($numbers);
    echo "<br>";

    print_r(array_slice($numbers, 2, 3));
    print_r($numbers);
    echo "<br>";

    foreach($numbers as $number) {
        echo $number;
        echo "<br>";
    }

    echo count($numbers);

    echo "<br>";

    $student = [
        "name" => "Student Name",
        2 => 66666,
        "mark" => 5.5
    ];

    print_r($student);
    var_dump($student);
    echo "<br>";

    $student["fn"];

    $student["email"] = "test@email.com";

    print_r($student);
    echo "<br>";

    foreach($student as $key => $value) {
        echo "$key: $value";
        echo "<br>";
    }

    $student[] = "hfjsfjkd";

    print_r($student);
    echo "<br>";

    echo $student["2"];
?>