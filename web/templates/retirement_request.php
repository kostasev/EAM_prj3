<?php
  /* user must be logged-in to use this page */
  session_start();

  include 'make_connection.php';

  if (!isset($_SESSION['user'])) {
    /* we have an access error */
    /* redirect properly */
    $redirect_url = 'access_error.php';
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
      $stampsCollected = $row['StampsCollected'];
      $avgYearlySalary = $row['AvgYearlySalary'];
      $yearlyPension = $row['YearlyPension'];
      $isRetired = $row['IsRetired'];
      $insuredChildren = $row['InsuredChildren'];

      $result->close();

      if ($isRetired) {
        /* we have an access error */
        $conn->close();
        /* redirect properly */
        $redirect_url = 'retirement_request_error.php';
        header('Location: ' . $redirect_url);
        exit();
      }
    }
  }

  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Retirement Request</title>
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
              <a class="nav-link dropdown-toggle" href="insurance.php" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
              <a class="nav-link dropdown-toggle" href="retirement.php" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
              <li class="breadcrumb-item"><a href="retirement_requests.php">Retirement Requests</a></li>
              <li class="breadcrumb-item"><a href="#">Special Needs Retirement Request</a></li>
            </ol>
          </nav>
        </div>

        <!-- REQUEST RETIREMENT PAGE CONTENT -->

        <div class="container">
      		<div class="row">
      			<div class="col-md-12" style="text-align:center">
      				<form action="retirement_request_result.php" method="post" onsubmit="return passwordsMatching()" id="retireRequestForm">
      					<input type="hidden" name="action" value="userProfile">
      					<br>
        				<h2><strong>Your insurance info</strong></h2>
                <p>You are about to request your retirement for special needs.
                   You can update your following information as desired.
                   We will process your request and we will inform you accordingly.</p>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>First Name</strong>
                      <input class="form-control" id="firstName" name="firstName" type="text" value="<?php echo $forname; ?>" required requiredMessage="Please enter your first name" pattern=".{1,45}" title="No more than 45 characters please.">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Second Name</strong>
                      <input class="form-control" id="secondName" name="secondName" type="text" value="<?php echo $surname; ?>" required requiredMessage="Please enter your second name" pattern=".{1,45}" title="No more than 45 characters please.">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Years Insured</strong>
                      <input class="form-control" id="yearsInsured" name="yearsInsured" type="number" min="0" value="<?php echo $yearsInsured; ?>" required requiredMessage="Please enter your years of insurance">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Years Employed</strong>
                      <input class="form-control" id="yearsEmployed" name="yearsEmployed" type="number" min="0" value="<?php echo $yearsEmployed; ?>" required requiredMessage="Please enter your years of employment">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Stamps Collected</strong>
                      <input class="form-control" id="stampsCollected" name="stampsCollected" type="number" min="0" value="<?php echo $stampsCollected; ?>" required requiredMessage="Please enter the number of stamps you have collected">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Average Yearly Salary</strong>
                      <input class="form-control" id="avgYearlySalary" name="avgYearlySalary" type="number" min="0" value="<?php echo $avgYearlySalary; ?>" required requiredMessage="Please enter your average yearly salary">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-6 form-group">
                    <label><strong>Disability</strong>
                      <br>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="disability" id="disability" value="Accident" checked style="width: 20%;">Accident
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="disability" id="disability" value="Disease">Disease
                        </label>
                      </div>
                    </label>
                  </div>
                </div>

                <br>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <button type="button" onClick="window.location.reload()" class="btn btn-outline-danger">Cancel</button>
                  </div>
                  <div class="col-md-6 form-group">
            				<input class="btn btn-primary" type="submit" value="Save">
                    <br> <br>
                  </div>
                </div>
              </form>
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
