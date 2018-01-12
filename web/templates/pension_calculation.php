<?php
  session_start();

  include 'make_connection.php';

  $sex = 'Male';
  $pensionType = 'Old age';
  $yearsEmployed = 0;
  $avgYearlySalary = 0;

  if (isset($_SESSION['user'])) {
    $userID = $_SESSION['userID'];

    /* fetch user's details */
    $query = "SELECT * FROM user WHERE UserID = '$userID'";
    $result = $conn->query($query);

    if (!$result) {
      /* we have an internal error */
      $conn->close();
      /* redirect properly */
      $redirect_url = 'internal_error.php';
      header('Location: ' . $redirect_url);
      exit();
    }
    else {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $isFemale = $row['IsFemale'];

      $result->close();

      $query = "SELECT * FROM information WHERE user_UserID = '$userID'";
      $result = $conn->query($query);

      if (!$result) {
        /* we have an internal error */
        $conn->close();
        /* redirect properly */
        $redirect_url = 'internal_error.php';
        header('Location: ' . $redirect_url);
        exit();
      }
      else {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $pensionType = $row['PensionType'];
        $yearsEmployed = $row['YearsEmployed'];
        $avgYearlySalary = $row['AvgYearlySalary'];

        $result->close();
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

    <title>IKA Pension Calculation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/calculation.css">

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
            <?php
              if (isset($_SESSION['user'])) {
            ?>
              <li class="nav-item">
                <a class="nav-link danger-tooltip" href="profile.php" id="profile" data-toggle="tooltip" data-placement="bottom">My Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
            <?php
              } else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Log In</a>
              </li>
            <?php
              }
            ?>
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
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="retirement.php" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Retirement
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="retirement_certifications.php">Certifications</a>
              <a class="dropdown-item" href="retirement_requests.php">Requests</a>
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
            <li class="breadcrumb-item"><a href="#">IKA Pension Calculation</a></li>
          </ol>
        </nav>
      </div>

        <!-- CALCULATION PAGE CONTENT - Pension calculation scenario -->
        <div class="container">
          <div class="row">
            <!-- CALCULATION FORM -->
        		<div class="col-md-12" style="text-align:center">
        			<form action="pension_calculation_result.php" method="post" id="logInForm">
        				<input type="hidden" name="action" value="userLogIn">
          			<h2><strong>Basic Pension Calculator</strong></h2>
                <p>Please insert your details</p>
                <br>
                <div class="row">
                  <div class="col-md-2 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Sex</strong>
                      <br>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="sex" id="male"  value="Male" <?php if ($sex == "Male") echo "checked"; ?> >&nbsp;&nbsp;Male&nbsp;&nbsp;
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="sex" id="male" value="Female" <?php if ($sex == "Female") echo "checked"; ?> >Female
                        </label>
                      </div>
                    </label>
                  </div>

                  <div class="col-md-2 form-group">
                    <label><strong>Pension Type</strong>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary <?php if ($pensionType == "Old age") echo "active"; ?> " for="old">
                          <input type="radio" name="type" id="old" value="oldAge">&nbsp;&nbsp;Old age&nbsp;&nbsp;
                        </label>
                        <label class="btn btn-secondary <?php if ($pensionType == "Disability") echo "active"; ?> " for="disabled">
                          <input type="radio" name="type" id="disabled" value="disability">&nbsp;Disability&nbsp;
                        </label>
                        <label class="btn btn-secondary <?php if ($pensionType == "Death of insured") echo "active"; ?> " for="insured">
                          <input type="radio" name="type" id="insured" value="deathOfInsured">&nbsp;Death of insured&nbsp;
                        </label>
                        <label class="btn btn-secondary <?php if ($pensionType == "Death of retired") echo "active"; ?> " for="retired">
                          <input type="radio" name="type" id="retired" value="deathOfRetired">Death of retired
                        </label>
                      </div>
                    </label>
                  </div>
                  <div class="col-md-2 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-2 form-group"></div>
                  <div class="col-md-3 form-group">
          					<label><Strong>Years of employment</strong>
          						<input class="form-control" id="yearsEmployed" name="yearsEmployed" <?php echo "value=\"$yearsEmployed\""; ?> type="number" placeholder="Must be positive number" min="0" required requiredMessage="Please enter your years of employment">
          					</label>
          				</div>

                  <div class="col-md-6 form-group text-center">
          					<label><strong>Average receivings per year</strong>
          						<input class="form-control" id="avgYearlySalary" name="avgYearlySalary" <?php echo "value=\"$avgYearlySalary\""; ?> type="number" min="0" step="0.01" placeholder="Must be positive number" required requiredMessage="Please enter your average receivings per year">
          					</label>
          				</div>
                </div>

                <br>
                <div class="row">
                  <div class="col-md-2 form-group"></div>
                  <div class="col-md-3 form-group">
                    <button type="reset" class="btn btn-outline-danger">Clear</button>
                  </div>
                  <div class="col-md-6 form-group">
            				<input class="btn btn-primary" type="submit" value="Calculate">
                  </div>
                    <div class="col-md-2 form-group"></div>
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
