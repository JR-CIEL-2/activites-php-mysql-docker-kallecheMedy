<?php
header('Content-Type: application/json');

$host = 'mysql'; 
$dbname = 'appdb'; 
$user = 'user'; 
$password = 'password'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    $stmt = $pdo->prepare("SELECT lat,lng FROM courses_markers WHERE course_id = ?");
    $stmt->execute([$courseId]);
    $markers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($markers) {
        $response = [
            ' voici les coordonnees' => $markers
        ];
        echo json_encode($response);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Course not found']);
    }
    exit;
} else {
    http_response_code(400);
    echo json_encode(['error' => 'ID is required']);
    exit;
}
?>
