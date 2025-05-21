<?php
session_start();
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            switch ($user['role']) {
                case 'admin':
                    header("Location: ../views/admin_dashboard.php");
                    break;
                case 'tenant':
                    header("Location: ../views/tenant_dashboard.php");
                    break;
                case 'owner':
                    header("Location: ../views/owner_dashboard.php");
                    break;
                case 'property_manager':
                    header("Location: ../views/Property_manager/dashboard.php");
                    break;
                case 'government':
                    header("Location: ../views/gov_dashboard.php");
                    break;
            }
            exit();
        }
    }

    header("Location: ../views/login_page.php?error=1");
}
?>
