<?php
session_start();
header('Content-Type: application/json');

// Decode the JSON data sent via fetch
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (isset($data['score'])) {
    $score = intval($data['score']);

    // Initialize or update session score
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    $_SESSION['score'] = $score; // Save the score for this session (replaces previous score)

    // Optionally, you can return the score to be used in the frontend
    echo json_encode([
        "success" => true,
        "score" => $_SESSION['score'], // Return updated session score
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid input."]);
}
?>
