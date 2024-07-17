<?php
require_once 'config.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $care_plan_id = $_POST['care_plan_id'];
    $care_plan = $_POST['care_plan'];

    $query = "UPDATE care_plans SET care_plan = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $care_plan, $care_plan_id);

    if ($stmt->execute()) {
        echo "Care plan updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Care Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Care Plan</h1>
        <form action="updateCarePlan.php" method="post">
            <div class="mb-3">
                <label for="care_plan_id" class="form-label">Care Plan ID</label>
                <input type="number" class="form-control" id="care_plan_id" name="care_plan_id" required>
            </div>
            <div class="mb-3">
                <label for="care_plan" class="form-label">Care Plan</label>
                <textarea class="form-control" id="care_plan" name="care_plan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Care Plan</button>
        </form>
    </div>
</body>
</html>
