<?php
include '../config/db_config.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];
    $name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $agreed = isset($_POST['agreed_terms']) ? 1 : 0;

    // Handle file upload
   $uploadOk = 1;
$target_dir = "../assets/uploads/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true); // Create directory if it doesn't exist
}

if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] === UPLOAD_ERR_OK) {
    $id_photo = basename($_FILES['id_photo']['name']);
    $target_file = $target_dir . $id_photo;

    if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $target_file)) {
        // Success
    } else {
        die("Failed to move uploaded file.");
    }
} else {
    die("No file uploaded or upload error occurred.");
}


    $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $password, $role);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    if ($role === 'tenant') {
        $stmt2 = $conn->prepare("INSERT INTO tenant_profiles (user_id, full_name, phone, address, id_photo, agreed_terms)
                                 VALUES (?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("issssi", $user_id, $name, $phone, $address, $id_photo, $agreed);
        $stmt2->execute();
    } else if ($role === 'owner') {
        $stmt3 = $conn->prepare("INSERT INTO owner_profiles (user_id, full_name, phone, address, id_photo, agreed_terms)
                                 VALUES (?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("issssi", $user_id, $name, $phone, $address, $id_photo, $agreed);
        $stmt3->execute();
    }

    header("Location: ../views/login_page.php?registered=1");
}
?>
