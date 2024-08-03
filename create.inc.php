<?php
require_once 'config.inc.php';
require_once 'DBConnection.php';

// Check if session is active, if not, start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit;
}

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

// Prepare SQL based on user type
$sql = "";
if ($userType == 'admin') {
    $sql = "SELECT adminID as userId, lastName FROM admins WHERE adminID = ?";
} elseif ($userType == 'resident') {
    $sql = "SELECT residentID as userId, lastName FROM residents WHERE residentID = ?";
} elseif ($userType == 'caregiver') {
    $sql = "SELECT caregiverID as userId, lastName FROM caregivers WHERE caregiverID = ?";
} else {
    echo "Invalid user type!";
    exit;
}

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit;
    }

    echo "User data fetched successfully!<br/>";
    echo "User ID: " . $user['userId'] . "<br/>";
    echo "Last Name: " . $user['lastName'] . "<br/>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
