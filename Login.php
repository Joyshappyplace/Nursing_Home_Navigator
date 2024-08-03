<?php
require_once 'DBConnection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $user = $_POST["user"]; // Assuming user type is provided by the form

    // Check if all fields are filled
    if (empty($email) || empty($pwd) || empty($user)) {
        $error = "Please fill in all fields";
        header("Location:../index.php?error=$error");
        exit;
    }

    // Determine the query based on user type
    switch ($user) {
        case 'admin':
            $query = "SELECT * FROM admin WHERE email = :email AND pwd = :pwd";
            $redirect = "../adminDashboard.php";
            break;
        case 'caregiver':
            $query = "SELECT * FROM caregivers WHERE email = :email AND pwd = :pwd";
            $redirect = "../caregiverDashboard.php";
            break;
        case 'resident':
            $query = "SELECT * FROM residents WHERE email = :email AND pwd = :pwd";
            $redirect = "../residentDashboard.php";
            break;
        default:
            $error = "Invalid user type";
            header("Location:../index.php?error=$error");
            exit;
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // User exists, start session
        $userData = $stmt->fetch();
        session_start();
        $_SESSION['user'] = $userData;
        header("Location: $redirect");
        exit;
    } else {
        $error = "Invalid email or password";
        header("Location:../index.php?error=$error");
        exit;
    }
} else {
    header("Location:../index.php");
    exit;
}
?>
