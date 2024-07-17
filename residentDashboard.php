<?php
// Assuming you have a valid database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$resident_id = $_SESSION['resident_id']; // Assuming the resident's ID is stored in the session

// Prepare the query with a parameter
$query = "SELECT * FROM care_plans WHERE resident_id =?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $resident_id); // "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='care-plan'>";
        echo "<h3>Care Plan ID: ". $row['id']. "</h3>";
        echo "<p>". $row['care_plan']. "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No care plans found.</p>";
}
$stmt->close();
$conn->close();
?>