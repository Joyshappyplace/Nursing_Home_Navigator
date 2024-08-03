<?php
require_once 'config.inc.php';
require_once 'DBConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $residentName = trim($_POST['residentName']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $caregiverName = trim($_POST['caregiverName']);
    $type = trim($_POST['type']);

    // Error checks
    if (empty($residentName) || empty($email) || empty($pwd) || empty($caregiverName) || empty($type)) {
        $error = "Please fill in all fields";
        header("Location: ../adminDashboard.php?error=" . urlencode($error));
        exit;
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
        header("Location: ../adminDashboard.php?error=" . urlencode($error));
        exit;
    }

    // Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    try {
        if ($type === 'resident') {
            $query = "INSERT INTO residents (residentName, email, pwd) VALUES (?, ?, ?)";
        } elseif ($type === 'caregiver') {
            $query = "INSERT INTO caregivers (residentName, email, pwd) VALUES (?, ?, ?)";
        } else {
            throw new Exception("Invalid type");
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute([$residentName, $email, $hashedPwd]);

        $pdo = null;
        $stmt = null;

        $_SESSION['message'] = 'Sign-up successful';
        header("Location: ../adminDashboard.php?message=" . urlencode($_SESSION['message']));
        exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $error = "Email already exists";
            header("Location: ../adminDashboard.php?error=" . urlencode($error));
        } else {
            $error = "Error: " . $e->getMessage();
            header("Location: ../adminDashboard.php?error=" . urlencode($error));
        }
        exit;
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
        header("Location: ../adminDashboard.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: ../adminDashboard.php");
    exit;
}
?>