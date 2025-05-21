<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once '../config/db_config.php'; // Ensure this connects to your DB with $conn

// Check if user is logged in and is an owner
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'owner') {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    $bedrooms = intval($_POST['bedrooms'] ?? 0);

    if (!$title || !$description || !$address || !$bedrooms || $price <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required and price must be valid.']);
        exit;
    }

    // Insert house details
    $stmt = $conn->prepare("INSERT INTO houses (owner_id, title, description, address, price, bedrooms, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("isssdi", $user_id, $title, $description, $address, $price, $bedrooms);

    if ($stmt->execute()) {
        $house_id = $stmt->insert_id;

        // Handle image uploads
        $upload_dir = '../assets/prop_img/';
        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($_FILES['photos']['tmp_name'] as $index => $tmp_path) {
            $original_name = $_FILES['photos']['name'][$index];
            $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed_ext)) continue;

            $new_filename = uniqid("house_") . "." . $ext;
            $target_path = $upload_dir . $new_filename;

            if (move_uploaded_file($tmp_path, $target_path)) {
                $stmt_img = $conn->prepare("INSERT INTO house_photos (house_id, photo_path) VALUES (?, ?)");
                $relative_path = '../assets/prop_img/' . $new_filename;
                $stmt_img->bind_param("is", $house_id, $relative_path);
                $stmt_img->execute();
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'House uploaded successfully and pending review.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error while uploading house.']);
    }

    $stmt->close();
}
?>
