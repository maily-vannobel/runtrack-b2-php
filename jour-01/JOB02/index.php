<?php

function my_str_reverse(string $string) : string {
    // initialiser chaîne vide pour stocker le résultat inversé
    $reversedString = '';

// initialise variable a 0 
// 'my_str_reverse()' calcule la longueur de la chaîne d'entrée manuellement en utilisant boucle while avec isset() (vérifie chaque caractère jusqu'à la fin. 
//puis, boucle for pour parcourir la chaîne de la fin au début, ajoutant chaque caractère à nvelle chaîne pour construire version inversée.

    $length = 0;
    while (isset($string[$length])) {
        $length++;
    }

    for ($i = $length - 1; $i >= 0; $i--) {
        $reversedString .= $string[$i];
    }

    return $reversedString;
}

$result = my_str_reverse('Hello');
echo $result; 

?>
