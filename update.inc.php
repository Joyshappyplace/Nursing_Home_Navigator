<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $residentName = trim($_POST['residentName']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $type = trim($_POST['type']);

    // Error checks
    if (empty($residentName) || empty($email) || empty($pwd) || empty($type)) {
        $_SESSION['error'] = "Please fill in all fields";
        header("Location: ../adminDashboard.php?error=" . urlencode($_SESSION['error']));
        exit;
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format";
        header("Location: ../adminDashboard.php?error=" . urlencode($_SESSION['error']));
        exit;
    }

    // Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

    try {
        require_once "DBConnection.php";

        if ($type === 'resident') {
            $query = "UPDATE residents SET email=?, pwd=? WHERE residentName=?";
        } elseif ($type === 'caregiver') {
            $query = "UPDATE caregivers SET email=?, pwd=? WHERE residentName=?";
        } else {
            throw new Exception("Invalid type");
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $hashedPwd, $residentName]);

        $pdo = null;
        $stmt = null;

        $_SESSION['message'] = 'Update successful';
        header("Location: ../adminDashboard.php?message=" . urlencode($_SESSION['message']));
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../adminDashboard.php?error=" . urlencode($_SESSION['error']));
        exit;
    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../adminDashboard.php?error=" . urlencode($_SESSION['error']));
        exit;
    }
} else {
    header("Location: ../adminDashboard.php");
    exit;
}
?>