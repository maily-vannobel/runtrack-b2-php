<?php

function my_str_search(string $letter, string $string): int {
    // Initialiser un compteur pour les occurrences
    $count = 0;

    // Parcourir chaque caractère de la chaîne
    for ($i = 0; isset($string[$i]); $i++) {
        // Utiliser isset() pour vérifier si l'index $i existe dans la chaîne $string
        if ($string[$i] === $letter) {
            // Si le caractère courant correspond à $letter, incrémenter le compteur
            $count++;
        }
    }

    // Retourner le nombre total d'occurrences de la lettre trouvées
    return $count;
}

// Appeler la fonction my_str_search() pour compter le nombre de 'a' dans la chaîne 'La PLateforme'
$result = my_str_search('a', 'La PLateforme');

// Utiliser echo pour afficher le résultat du comptage
echo($result);

?>
