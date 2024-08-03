<?php
require_once 'config.inc.php';
require_once 'DBConnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="assets/css/aos.css" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  />
  <link rel="stylesheet" href="../CSS/style.css" />
    <title>Caregiver Dashboard</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <a class="navbar-brand mx-lg-auto mb-lg-4" href="#">
                <span class="h4 fw-bold" style="color:black;">Nursing Home Navigator</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#residentList">Resident List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#createCarePlan">Create Care Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#updateCarePlan">Update Care Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- //NAVBAR -->

    <!--CONTENT WRAPPER-->
    <div class="content-wrapper">
        <!--HOME-->
        <section id="home" class="full-height px-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4 fw-bold d-flex justify-content-center align-items-center " data-aos="fade-up">Caregiver Dashboard</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <p>If you have any issues, contact us.</p>
                        <a href="#" class="link-custom">Call: (233) 3454 2342</a>
                    </div>
                </div>
            </div>
        </section>
        <!--//HOME-->
        
        <!--RESIDENT LIST-->
        <section id="residentList" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center" data-aos="fade-up">
                    <h1 class="text-brand">Resident List</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <?php
                            $query = "SELECT * FROM residents";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered'>";
                                echo "<thead><tr><th>ID</th><th>Name</th><th>Age</th><th>Room</th></tr></thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . $row['room'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody></table>";
                            } else {
                                echo "<p>No residents found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--//RESIDENT LIST-->
        
        <!--CREATE CARE PLAN-->
        <section id="createCarePlan" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center" data-aos="fade-up">
                    <h1 class="text-brand">Create Care Plan</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <form action="includes/create_care_plan.inc.php" method="post">
                                <div class="mb-3">
                                    <label for="resident_id" class="form-label">Resident ID</label>
                                    <input type="text" class="form-control" id="resident_id" name="resident_id" required>
                                </div>
                                <div class="mb-3">
                                    <label for="care_plan" class="form-label">Care Plan</label>
                                    <textarea class="form-control" id="care_plan" name="care_plan" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-brand fw-bold">Create Care Plan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--//CREATE CARE PLAN-->
        
        <!--UPDATE CARE PLAN-->
        <section id="updateCarePlan" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center" data-aos="fade-up">
                    <h1 class="text-brand">Update Care Plan</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <form action="includes/update_care_plan.inc.php" method="post">
                                <div class="mb-3">
                                    <label for="resident_id" class="form-label">Resident ID</label>
                                    <input type="text" class="form-control" id="resident_id" name="resident_id" required>
                                </div>
                                <div class="mb-3">
                                    <label for="care_plan" class="form-label">Care Plan</label>
                                    <textarea class="form-control" id="care_plan" name="care_plan" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-brand fw-bold">Update Care Plan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--//UPDATE CARE PLAN-->
        
    </div>
    <!--//CONTENT WRAPPER-->

    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"
  ></script>

</body>

</html>
