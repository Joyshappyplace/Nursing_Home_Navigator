<?php
require_once 'config.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO payments (resident_id, amount) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("id", $resident_id, $amount);

    if ($stmt->execute()) {
        echo "Payment made successfully.";
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
    <title>Make Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Make Payment</h1>
        <form action="makePayment.php" method="post">
            <div class="mb-3">
                <label for="resident_id" class="form-label">Resident ID</label>
                <input type="number" class="form-control" id="resident_id" name="resident_id" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Make Payment</button>
        </form>
    </div>
</body>
</html>
