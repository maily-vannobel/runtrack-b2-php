<?php

function my_is_multiple(int $divider, int $multiple) : bool {
    return $multiple % $divider === 0;
}

$result = my_is_multiple(2, 4);
echo $result ? 'true' : 'false'; 