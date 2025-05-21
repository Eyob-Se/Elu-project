<?php
/**
 * Backend for Rental System with multiple user roles
 * Built using PHP and MySQL (with MySQLi)
 */

// db_config.php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rental_system";
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// auth.php (register and login logic)
function register($role, $name, $email, $password, $phone, $id_photo, $address) {
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (role, name, email, password, phone, id_photo, address, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'active')");
    $stmt->bind_param("sssssss", $role, $name, $email, $password, $phone, $id_photo, $address);
    return $stmt->execute();
}

function login($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, password, role, status FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            if ($user['status'] != 'active') return "Account inactive";
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            return "Login success";
        }
    }
    return "Invalid credentials";
}

// upload_house.php (owner uploads house)
function uploadHouse($owner_id, $title, $location, $price) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO houses (owner_id, title, location, price, is_approved, is_rented) VALUES (?, ?, ?, ?, 0, 0)");
    $stmt->bind_param("isss", $owner_id, $title, $location, $price);
    return $stmt->execute();
}

// property_manager_approve.php
function reviewHouse($manager_id, $house_id, $approve) {
    global $conn;
    $stmt = $conn->prepare("UPDATE houses SET is_approved = ? WHERE id = ?");
    $stmt->bind_param("ii", $approve, $house_id);
    return $stmt->execute();
}

// tenant_request.php
function requestHouse($tenant_id, $house_id, $manager_id, $owner_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO rental_requests (tenant_id, house_id, manager_id, owner_id, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->bind_param("iiii", $tenant_id, $house_id, $manager_id, $owner_id);
    return $stmt->execute();
}

// owner_response.php
function respondRequest($request_id, $status) {
    global $conn;
    $stmt = $conn->prepare("UPDATE rental_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $request_id);
    return $stmt->execute();
}

// property_manager_approval.php
function finalizeApproval($request_id, $approved) {
    global $conn;
    $status = $approved ? 'approved' : 'declined';
    $stmt = $conn->prepare("UPDATE rental_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $request_id);
    return $stmt->execute();
}

// payment.php
function recordTransaction($tenant_id, $house_id, $amount, $tax) {
    global $conn;
    $total = $amount + $tax;
    $stmt = $conn->prepare("INSERT INTO transactions (tenant_id, house_id, amount, tax, total, transaction_status) VALUES (?, ?, ?, ?, ?, 'paid')");
    $stmt->bind_param("iiidd", $tenant_id, $house_id, $amount, $tax, $total);
    return $stmt->execute();
}

// lease_agreement.php
function createLeaseAgreement($tenant_id, $owner_id, $house_id, $file_path) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO lease_agreements (tenant_id, owner_id, house_id, agreement_pdf, tenant_signed, owner_signed) VALUES (?, ?, ?, ?, 1, 1)");
    $stmt->bind_param("iiis", $tenant_id, $owner_id, $house_id, $file_path);
    return $stmt->execute();
}

// notifications.php
function sendNotification($sender_id, $receiver_id, $message, $type) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO notifications (sender_id, receiver_id, message, type, is_read) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("iiss", $sender_id, $receiver_id, $message, $type);
    return $stmt->execute();
}

// report.php
function reportToGovernment($manager_id, $transaction_id, $report_file, $is_suspicious) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO reports (manager_id, transaction_id, report_file, suspicious, sent_to_government) VALUES (?, ?, ?, ?, 1)");
    $stmt->bind_param("iisi", $manager_id, $transaction_id, $report_file, $is_suspicious);
    return $stmt->execute();
}

// admin_controls.php (activate/deactivate/delete user)
function updateUserStatus($user_id, $status) {
    global $conn;
    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $user_id);
    return $stmt->execute();
}

function deleteUser($user_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    return $stmt->execute();
}

?>

// Example: Sending payment
fetch('api/payment_handler.php', {
  method: 'POST',
  body: new FormData(document.querySelector('#paymentForm'))
}).then(res => res.json())
  .then(data => alert(data.message));
