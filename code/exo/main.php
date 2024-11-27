<?php
include 'statistique.php';
include 'tri_selection.php';
include 'read_tab.php';

$salaires = [1500, 1700, 1800, 2000, 2200, 2500, 3000, 3300, 4000];
$moyenne = (int)moyenne($salaires); 
$mediane = mediane($salaires);
$nicolas = 2200;
$est_moins_paye = $nicolas < $mediane ? "Oui" : "Non";

echo "Moyenne des salaires : " . $moyenne ." euro <br>";
echo "Médiane des salaires : " . $mediane ." euro <br>";
echo "Nicolas est parmi les moins bien payés : " . $est_moins_paye ."<br>";



$tableau = [5, 3, 8, 4, 2];

echo "Tableau original : ";
read_tab($tableau);

$tableau_trie_valeur = tri_selection_valeur($tableau);
echo "Tableau trié (passage par valeur) : ";
read_tab($tableau_trie_valeur);

tri_selection_reference($tableau);
echo "Tableau trié (passage par référence) : ";
read_tab($tableau);
?>
