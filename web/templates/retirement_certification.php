<?php
  session_start();

  include 'make_connection.php';

  if (!isset($_SESSION['user'])) {
    /* user is not logged-in */
    $_SESSION['intermediate'] = true;
    $_SESSION['intermediate_for'] = 'retirement_certification.php';
    /* redirect properly */
    $redirect_url = 'login.php';
    header('Location: ' . $redirect_url);
    exit();
  }

  $query = sprintf("SELECT * FROM user WHERE Email = '%s'", $_SESSION['email']);

  $result = $conn->query($query);
  if (!$result) {
    /* we have an access error */
    $conn->close();
    /* redirect properly */
    $redirect_url = 'access_error.php';
    header('Location: ' . $redirect_url);
    exit();
  }
  else {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $userID = $row['UserID'];
    $forname = $row['FirstName'];
    $surname = $row['LastName'];
    $father = $row['FathersName'];
    $mother = $row['MothersName'];
    $date = $row['DateOfBirth'];
    $place = $row['BirthPlace'];
    $home = $row['HomeAddress'];
    $postal = $row['PostalCode'];
    $afm = $row['AFM'];
    $id = $row['IDNumber'];
    $phone = $row['PhoneNumber'];
    $email = $row['Email'];
    $password = $row['Password'];
    $isFemale = $row['IsFemale'];
    $isSpecial = $row['IsSpecial'];

    $result->close();

    $query = "SELECT * FROM information WHERE user_UserID = '$userID'";

    $result = $conn->query($query);
    if (!$result) {
      /* we have an access error */
      $conn->close();
      /* redirect properly */
      $redirect_url = 'access_error.php';
      header('Location: ' . $redirect_url);
      exit();
    }
    else {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $yearsInsured = $row['YearsInsured'];
      $yearsEmployed = $row['YearsEmployed'];
      $avgYearlySalary = $row['AvgYearlySalary'];
      $yearlyPension = $row['YearlyPension'];
      $isRetired = $row['IsRetired'];

      $result->close();
    }
  }

  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Retirement Certification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

  </head>
  <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
          <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="col-md-2"></div>
          <div>
            <a class="navbar-brand" href="main.php"><img src="../images/ikalogo.png" style="width:120px;" alt="logo"></a>
          </div>
          <div class="col-md-3">
            <form class="navbar-collapse collapse" id="navbarsExampleDefault2">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          <div class="col-md-2"></div>
          <div role="navigation" class="navbar-collapse collapse" id="navbarsExampleDefault" aria-expanded="false" style="">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link danger-tooltip" href="profile.php" id="profile" data-toggle="tooltip" data-placement="bottom">My Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
              <li class="navbar-item">
                <select class="custom-select">
                  <option value="Albanian">Albanian</option>
                  <option value="Bulgarian">Bulgarian</option>
                  <option value="Egyptian">Egyptian</option>
                  <option value="English" selected>English</option>
                  <option value="French">French</option>
                  <option value="German">German</option>
                  <option value="Greek">Greek</option>
                  <option value="Italian">Italian</option>
                  <option value="Polish">Polish</option>
                  <option value="Romanian">Romanian</option>
                  <option value="Russian">Russian</option>
                  <option value="Serbian">Serbian</option>
                  <option value="Turkish">Turkish</option>
                </select>
              </li>
            </ul>
          </div>
        </nav>


        <!-- NAVBAR -->
        <div class="container">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Insurance
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="insurance_certifications.php">Certifications</a>
                <a class="dropdown-item" href="insurance_requests.php">Requests</a>
                <a class="dropdown-item" href="stamps_calculation.php">Stamps Calculation</a>
                <a class="dropdown-item" href="pension_calculation.php">Pension Calculation</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Retirement
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="retirement_certifications.php">Certifications</a>
                <a class="dropdown-item" href="retirement_requests.php">Requests</a>
                <a class="dropdown-item" href="pension_calculation.php">Pension Calculation</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Disability</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Employers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
          <hr>
        </div>

        <!-- BREADCRUMB -->
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="main.php">IKA</a></li>
              <li class="breadcrumb-item"><a href="retirement.php">Retirement</a></li>
              <li class="breadcrumb-item"><a href="retirement_certifications.php">Retirement Certifications</a></li>
              <li class="breadcrumb-item"><a href="#">Retirement Certification</a></li>
            </ol>
          </nav>
        </div>

        <!-- REQUEST RESULT CONTENT -->

        <div class="container">
          <div class="row">

            <!-- CERTIFICATION RESULT -->
            <div class="col-md-12" style="text-align:center">
              <h2 class='text-center'><strong>Retirement certification</strong></h2>

              <?php
                echo "<p class='text-center'>$forname $surname of $father and $mother
                      has been insured for $yearsInsured years, employed for $yearsEmployed years and has declared an average yearly salary of $avgYearlySalary euros.</h2>";
                if ($isRetired) {
                  echo "<p class='text-center'>$forname $surname has been retired and receives a yearly pension of $yearlyPension euros.</h2>";
                } else {
                  echo "<p class='text-center'>$forname $surname has not been retired yet and receives no pension.</h2>";
                }
              ?>

            </div>

          </div>
      	</div>

        <!-- FOOTER -->
        <footer class="footer" style="background-color: #ffffff;padding-top: 50px;">
            <div class="footer-bottom">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <!--Footer Bottom-->
                    <p class="text-center">&copy; Copyright 2018 - University of Athens Di.  All rights reserved.</p>
                  </div>
                </div>
              </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBX5iDXPWX9yVKjUC5FD_hX36CttO5DmzQ&callback=initMap">
        </script>

  </body>

</html>
