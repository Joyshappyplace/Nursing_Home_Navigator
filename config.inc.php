<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params(1800, '/', 'localhost', true, true);

session_start();

require_once 'DBConnection.php';

function regenerate_session_id() {
    $_SESSION["last_regeneration"] = time();
}


function regenerate_session_id_loggedIn() {
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}

if (isset($_SESSION['admin_id'])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedIn();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedIn();
        }
    }
} elseif (isset($_SESSION['resident_id'])) {
    // Fetch resident data and store in session
    $residentId = $_SESSION['resident_id'];
    $stmt = $pdo->prepare("SELECT residentID, firstName, lastName, medicalRecords, carePlan, prescriptionSchedule, foodRequirements, activityChoices FROM residents WHERE residentID = ?");
    $stmt->execute([$residentId]);
    $resident = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resident) {
        $_SESSION['resident_data'] = $resident;
    } else {
        // Handle resident not found case
        echo "Resident not found!";
        exit;
    }

    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
} elseif (isset($_SESSION['caregiver_id'])) {
    // Fetch caregiver data and store in session
    $caregiverId = $_SESSION['caregiver_id'];
    $stmt = $pdo->prepare("SELECT caregiverID, firstName, lastName, email, phone FROM caregivers WHERE caregiverID = ?");
    $stmt->execute([$caregiverId]);
    $caregiver = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($caregiver) {
        $_SESSION['caregiver_data'] = $caregiver;
    } else {
        // Handle caregiver not found case
        echo "Caregiver not found!";
        exit;
    }

    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
        $_SESSION["last_regeneration"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}
?>
<?php 