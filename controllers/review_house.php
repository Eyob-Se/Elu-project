<?php
session_start();
require_once '../config/db_config.php'; // Your DB connection

// Check permission
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'property_manager') {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Access denied.']);
    exit;
}

$property_manager_id = $_SESSION['user_id'];

// Validate POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $house_id = intval($_POST['house_id'] ?? 0);
    $action = $_POST['action'] ?? '';

    if (!$house_id || !in_array($action, ['approve', 'decline'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        exit;
    }

    // Get the owner of the house
    $stmt_owner = $conn->prepare("SELECT owner_id FROM houses WHERE id = ?");
    $stmt_owner->bind_param("i", $house_id);
    $stmt_owner->execute();
    $stmt_owner->bind_result($owner_id);
    if (!$stmt_owner->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'House not found']);
        exit;
    }
    $stmt_owner->close();

    // Update house status
    $status = ($action === 'approve') ? 'approved' : 'declined';
    $stmt = $conn->prepare("UPDATE houses SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $house_id);

    if ($stmt->execute()) {
        // Send notification to owner
        $message = ($status === 'approved') ?
            "Your house listing (ID: $house_id) has been approved by the property manager." :
            "Your house listing (ID: $house_id) was declined by the property manager.";

        $stmt_notify = $conn->prepare("INSERT INTO notifications (user_id, message, type) VALUES (?, ?, 'house_review')");
        $stmt_notify->bind_param("is", $owner_id, $message);
        $stmt_notify->execute();

        echo json_encode(['status' => 'success', 'message' => 'House review updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update review.']);
    }

    $stmt->close();
}
?>
