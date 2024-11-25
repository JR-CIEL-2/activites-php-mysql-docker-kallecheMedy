<?php
function mediane($tableau) {
    $n = count($tableau);
    
    if ($n % 2 == 0) {
        $milieu1 = $tableau[$n / 2 - 1];
        $milieu2 = $tableau[$n / 2];
        return ($milieu1 + $milieu2) / 2;
    } else {
        return $tableau[($n - 1) / 2];
    }
}

function moyenne($tableau) {
    $somme = 0;
    $n = count($tableau);
    
    foreach ($tableau as $valeur) {
        $somme += $valeur;
    }
    
    return $somme / $n;
}
?>
