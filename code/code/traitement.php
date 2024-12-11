<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $message = htmlspecialchars($_POST['message']);
    $of_age = isset($_POST['of_age']) ? true : false;

    $data_file = 'data.json';

    // Si le fichier n'existe pas, crée un fichier vide
    if (!file_exists($data_file)) {
        file_put_contents($data_file, json_encode([]));
    }

    // Récupérer les données du fichier JSON
    $data = json_decode(file_get_contents($data_file), true) ?? [];

    // Vérifier si un utilisateur avec le même email existe déjà
    $user_exists = false;
    foreach ($data as $user) {
        if ($user['email'] === $email) {
            $user_exists = true;
            break;
        }
    }

    // Si l'utilisateur existe déjà, rediriger avec un message d'erreur
    if ($user_exists) {
        header('Location: ../index.html?error=true');
        exit;
    } else {
        // Ajouter l'utilisateur au tableau
        $data[] = [
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'message' => $message,
            'of_age' => $of_age
        ];

        // Sauvegarder les données dans le fichier JSON
        file_put_contents($data_file, json_encode($data, JSON_PRETTY_PRINT));

        // Rediriger avec un message de succès
        header('Location: index.html?success=true');
        exit;
    }
} else {
    echo '<p class="text-danger">Aucune donnée reçue.</p>';
}
?>
