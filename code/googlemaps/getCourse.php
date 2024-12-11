<?php
header('Content-Type: application/json');

$coursesFile = 'courses.json';
$coursesData = json_decode(file_get_contents($coursesFile), true);

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];
    foreach ($coursesData as $course) {
        if ($course['id'] === $courseId) {
            echo json_encode($course);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error' => 'Course not found']);
    exit;
} else {
  
    http_response_code(400);
    echo json_encode(['error' => 'ID is required']);
    exit;
}
?>