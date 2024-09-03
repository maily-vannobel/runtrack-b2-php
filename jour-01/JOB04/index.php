<?php

function my_fizz_buzz(int $length): array {
    // Initialiser le tableau qui sera retourné
    $result = [];

    // Parcourir les entiers de 1 à $length
    for ($i = 1; $i <= $length; $i++) {
        // Vérifier si $i multiple de 3 et 5, puis de 3, puis de 5
        if ($i % 3 === 0 && $i % 5 === 0) {
            $result[] = "FizzBuzz";
        }
        elseif ($i % 3 === 0) {
            $result[] = "Fizz";
        }
        elseif ($i % 5 === 0) {
            $result[] = "Buzz";
        }
        // Si $i  multiple ni de 3 ni de 5
        else {
            $result[] = $i;
        }
    }

    return $result;
}

$result = my_fizz_buzz(15);
print_r($result);

?>
