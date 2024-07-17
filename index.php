<?php
require_once 'config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Nursing Home Navigator - Log In</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-xl bg-dark navbar-dark fixed-top">
      <div class="container">
        <a href="#" class="navbar-brand">Nursing Home Navigator</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    
    <section class="section-padding">
      <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row p-3">
        </div>
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
          <!--------------------------- Left Box ----------------------------->
          <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" >
            <div class="featured-image mb-3">
              <img src="../Images/nursing_home.png" class="img-fluid" alt="Nursing Home">
            </div>
            <p class="text-white fs-2" style="font-weight: 600;">Providing Quality Care</p>
          </div> 
          <!-------------------- ------ Right Box ---------------------------->
          <div class="col-md-6 right-box">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="header-text mb-3">
                <h2>Welcome Back</h2>
                <p>We are glad to see you again.</p>
              </div>
              <form action="includes/login.php" method="post">
                <div class="form-group mb-3">
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group mb-3">
                  <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group mb-3">
                  <label for="role">Select Role:</label>
                  <select class="form-control" id="role" name="user" required>
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="caregiver">caregiver</option>
                    <option value="resident">Resident</option>
                  </select>
                </div>
                <button type="submit" class="btn btn1">Submit</button>
              </form>
              <?php
              // Display error message if set
              if (isset($_GET["error"])) {
                  echo "<p style='color: red;'>$_GET[error]</p>";
              }
              ?>
            </div>
          </div> 
        </div>
      </div>
    </section>

    <form action="includes/logOut.php" method="post">
      <button type="submit" class="btn btn-primary">Log Out</button>
    </form>

    <footer class="foot p-2 text-center fixed-bottom">
      <div class="container">
        <p class="text-white">All Rights Reserved &copy; Nursing Home Navigator</p>
      </div>
    </footer>
   
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
