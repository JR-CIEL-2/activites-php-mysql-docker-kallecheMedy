<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Données soumises</h1>
        <div class="card">
            <div class="card-body">
                <?php
             
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = htmlspecialchars($_POST['name']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    $message = htmlspecialchars($_POST['message']);
                    $of_age = isset($_POST['of_age']) ? "Oui" : "Non";

                  
                    echo "<p><strong>Nom :</strong> $name</p>";
                    echo "<p><strong>Prénom :</strong> $prenom</p>";
                    echo "<p><strong>Email :</strong> $email</p>";
                    echo "<p><strong>Mot de passe :</strong> $password</p>";
                    echo "<p><strong>Message :</strong> $message</p>";
                    echo "<p><strong>Âge légal :</strong> $of_age</p>";
                } else {
                    echo "<p>Aucune donnée reçue.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
