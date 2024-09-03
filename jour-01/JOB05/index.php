<?php
//nb divisible par 1 ou lui mm (verif si inf ou = à 1)
function my_is_prime(int $number): bool {
    if ($number <= 1) {
        return false;
    }

    // vérif si le nb est 2 (seul nombre premier pair)
    if ($number === 2) {
        return true;
    }

    // verif si nb divisible par nb de 2 à la racine carrée de $number
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false; // Si $number est divisible par $i, il n'est pas premier
        }
    }

    return true;
}

$result1 = my_is_prime(7);
echo $result1 ? 'true' : 'false';  

$result2 = my_is_prime(10);
echo $result2 ? 'true' : 'false'; 

?>
