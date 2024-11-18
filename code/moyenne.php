<?php
function moyenne($notes) {
    return array_sum($notes) / count($notes);
}
$tab = [15, 12, 9];
$moyenne = moyenne($tab);
echo 'La moyenne est de ' . $moyenne . '/20.';
?>
