<?php
require_once 'config.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resident_id = $_POST['resident_id'];
    $care_plan = $_POST['care_plan'];

    $query = "INSERT INTO care_plans (resident_id, care_plan) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $resident_id, $care_plan);

    if ($stmt->execute()) {
        echo "Care plan created successfully.";
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
    <title>Create Care Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Create Care Plan</h1>
        <form action="createCarePlan.php" method="post">
            <div class="mb-3">
                <label for="resident_id" class="form-label">Resident ID</label>
                <input type="number" class="form-control" id="resident_id" name="resident_id" required>
            </div>
            <div class="mb-3">
                <label for="care_plan" class="form-label">Care Plan</label>
                <textarea class="form-control" id="care_plan" name="care_plan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Care Plan</button>
        </form>
    </div>
</body>
</html>
