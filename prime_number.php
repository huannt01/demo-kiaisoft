<?php

function primenumber($number) {
    $n = 0;
    $divisor = $number / 2 + 1;

    for ($i = 2; $i < $divisor; $i++) {
        if ($number % $i == 0) {
            $n++;
            break;
        }
    }

    if ($n == 0) {
        echo $number . ' ';
    } 
}

$x = 3;
$y = 50;
echo "Prime numbers between " . $x . " and " . $y . " are: \n";
for ($i = $x; $i < $y + 1; $i++) {
    primenumber($i);
}