<?php
require_once 'config.inc.php';
require_once 'DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $residentId = $_POST['residentId'];
    $caregiverName = $_POST['caregiverName'];
    $carePlanDescription = $_POST['carePlanDescription'];
    $carePlanStartDate = $_POST['carePlanStartDate'];
    $carePlanEndDate = $_POST['carePlanEndDate'];

    // Error checks
    if (empty($residentId) || empty($caregiverName) || empty($carePlanDescription) || empty($carePlanStartDate) || empty($carePlanEndDate)) {
        $error = "Please fill in all fields";
        header("Location: ../adminDashboard.php?error=" . urlencode($error));
        exit;
    }

    try {
        $query = "INSERT INTO carePlans (residentId, caregiverName, carePlanDescription, carePlanStartDate, carePlanEndDate) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$residentId, $caregiverName, $carePlanDescription, $carePlanStartDate, $carePlanEndDate]);

        $_SESSION['message'] = 'Care plan created successfully.';
        header("Location: ../adminDashboard.php?message=" . urlencode($_SESSION['message']));
        exit;
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        header("Location: ../adminDashboard.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: ../adminDashboard.php");
    exit;
}
?>