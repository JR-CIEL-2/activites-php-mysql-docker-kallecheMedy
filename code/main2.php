<?php
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['tableau'])) {
    $tableau = $data['tableau'];

    $tableau_complet = array_merge($tableau, $tableau, $tableau);

    sort($tableau_complet);

    $n = count($tableau_complet);
    if ($n % 2 == 0) {
        $milieu1 = $tableau_complet[$n / 2 - 1];
        $milieu2 = $tableau_complet[$n / 2];
        $mediane = ($milieu1 + $milieu2) / 2;
    } else {
        $mediane = $tableau_complet[($n - 1) / 2];
    }

    $response = [
        'tableau' => $tableau_complet,
        'mediane' => $mediane
    ];

    echo json_encode($response);
}
?>
