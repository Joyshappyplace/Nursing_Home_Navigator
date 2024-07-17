<?php
require_once 'config.inc.php';
require_once 'DBConnection.php';

function getAllResidents() {
    // Assuming you have a function to get all residents from the database
    // Implement the function logic here to fetch residents
    return [
        ['residentID' => 1, 'firstName' => 'John', 'lastName' => 'Doe', 'gender' => 'Male', 'email' => 'john@example.com', 'age' => 75, 'roomNumber' => 101],
        // Add more resident records as needed
    ];
}

function getAllCaregivers() {
    // Assuming you have a function to get all caregivers from the database
    // Implement the function logic here to fetch caregivers
    return [
        ['caregiverID' => 1, 'firstName' => 'Jane', 'lastName' => 'Smith', 'gender' => 'Female', 'email' => 'jane@example.com', 'phoneNumber' => '123-456-7890', 'department' => 'Nursing'],
        // Add more caregiver records as needed
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="assets/css/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <title>Nursing Home Navigator - Admin Dashboard</title>
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
                        <a class="nav-link" href="#addResident">Add Resident</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#updateResident">Update Resident</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#deleteResident">Delete Resident</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#residentList">Resident List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#addCaregiver">Add Caregiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#updateCaregiver">Update Caregiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#deleteCaregiver">Delete Caregiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#caregiverList">Caregiver List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- //NAVBAR -->

    <!-- CONTENT WRAPPER -->
    <div class="content-wrapper">
        <!-- HOME -->
        <section id="home" class="full-height px-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4 fw-bold d-flex justify-content-center align-item-center " data-aos="fade-up">Admin Dashboard</h1>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-item-center">
                        <p>In case of any issues, contact us.</p>
                        <a href="#" class="link-custom">.......Call: (233) 3454 2342</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //HOME -->

        <!-- ADD RESIDENT -->
        <section id="addResident" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Add a Resident</h1>
                    <div class="row ">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">ADD</h6>
                            <form action="includes/addResident.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="gender" class="form-control" placeholder="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="age" placeholder="Age">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="roomNumber" placeholder="Room Number">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //ADD RESIDENT -->

        <!-- UPDATE RESIDENT -->
        <section id="updateResident" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Update Resident Information</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">UPDATE</h6>
                            <form action="includes/updateResident.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="gender" class="form-control" placeholder="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="age" placeholder="Age">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="roomNumber" placeholder="Room Number">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //UPDATE RESIDENT -->

        <!-- DELETE RESIDENT -->
        <section id="deleteResident" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Delete Resident</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">DELETE</h6>
                            <form action="includes/deleteResident.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" name="residentID" placeholder="Resident ID">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //DELETE RESIDENT -->

        <!-- RESIDENT LIST -->
        <section id="residentList" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Resident List</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">LIST</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Resident ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Room Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $residents = getAllResidents();
                                    foreach ($residents as $resident) {
                                        echo '<tr>';
                                        echo '<td>' . $resident['residentID'] . '</td>';
                                        echo '<td>' . $resident['firstName'] . '</td>';
                                        echo '<td>' . $resident['lastName'] . '</td>';
                                        echo '<td>' . $resident['gender'] . '</td>';
                                        echo '<td>' . $resident['email'] . '</td>';
                                        echo '<td>' . $resident['age'] . '</td>';
                                        echo '<td>' . $resident['roomNumber'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //RESIDENT LIST -->

        <!-- ADD CAREGIVER -->
        <section id="addCaregiver" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Add a Caregiver</h1>
                    <div class="row ">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">ADD</h6>
                            <form action="includes/addCaregiver.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="gender" class="form-control" placeholder="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="department" placeholder="Department">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //ADD CAREGIVER -->

        <!-- UPDATE CAREGIVER -->
        <section id="updateCaregiver" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Update Caregiver Information</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">UPDATE</h6>
                            <form action="includes/updateCaregiver.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="gender" class="form-control" placeholder="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="department" placeholder="Department">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //UPDATE CAREGIVER -->

        <!-- DELETE CAREGIVER -->
        <section id="deleteCaregiver" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Delete Caregiver</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">DELETE</h6>
                            <form action="includes/deleteCaregiver.inc.php" method="post" class="row g-lg-3 gy-3">
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" name="caregiverID" placeholder="Caregiver ID">
                                </div>
                                <div class="form-group col-12 d-grid">
                                    <button type="submit" class="btn btn-brand fw-bold">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //DELETE CAREGIVER -->

        <!-- CAREGIVER LIST -->
        <section id="caregiverList" class="full-height px-lg-5">
            <div class="container">
                <div class="justify-content-center text-center " data-aos="fade-up">
                    <h1 class="text-brand">Caregiver List</h1>
                    <div class="row">
                        <div class="col-12 pb-4" data-aos="fade-up">
                            <h6 class="text-brand">LIST</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Caregiver ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $caregivers = getAllCaregivers();
                                    foreach ($caregivers as $caregiver) {
                                        echo '<tr>';
                                        echo '<td>' . $caregiver['caregiverID'] . '</td>';
                                        echo '<td>' . $caregiver['firstName'] . '</td>';
                                        echo '<td>' . $caregiver['lastName'] . '</td>';
                                        echo '<td>' . $caregiver['gender'] . '</td>';
                                        echo '<td>' . $caregiver['email'] . '</td>';
                                        echo '<td>' . $caregiver['phoneNumber'] . '</td>';
                                        echo '<td>' . $caregiver['department'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //CAREGIVER LIST -->
    </div>
    <!-- //CONTENT WRAPPER -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
