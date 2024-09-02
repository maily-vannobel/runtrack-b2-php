<?php

function my_str_search(string $letter, string $string): int {
    // Initialiser un compteur pour les occurrences
    $count = 0;

    // Parcourir chaque caractère de la chaîne
    for ($i = 0; isset($string[$i]); $i++) {
        if ($string[$i] === $letter) {
            $count++;
        }
    }

    return $count;
}

$result = my_str_search('a', 'La PLateforme');
echo($result);

?>
