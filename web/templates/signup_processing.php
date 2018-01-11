<!DOCTYPE html>
<?php
  include 'make_connection.php';

  session_start();

  /* errors array */
  $errors = array('EMAIL_EXISTS' => false,
                  'AFM_EXISTS' => false,
                  'IDNUMBER_EXISTS' => false);

  /* gather details */
  $forname = isset($_POST['firstName']) ? $_POST['firstName'] : '';
  $surname = isset($_POST['secondName']) ? $_POST['secondName'] : '';
  $father = isset($_POST['fathersName']) ? $_POST['fathersName'] : '';
  $mother = isset($_POST['mothersName']) ? $_POST['mothersName'] : '';
  $date = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : '';
  $place = isset($_POST['placeOfBirth']) ? $_POST['placeOfBirth'] : '';
  $home = isset($_POST['homeAddress']) ? $_POST['homeAddress'] : '';
  $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
  $postal = isset($_POST['postalCode']) ? $_POST['postalCode'] : '';
  $afm = isset($_POST['AFM']) ? $_POST['AFM'] : '';
  $id = isset($_POST['IDNumber']) ? $_POST['IDNumber'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $special = 0;

  /* Check for unique AFM */
  $query = "SELECT * FROM user WHERE AFM='$afm'";
  $result = $conn->query($query);
  if($result->num_rows > 0) $errors['AFM_EXISTS'] = true;
  // echo $result->num_rows;
  $result->close();

  /* Check for unique IDNumber */
  $query = "SELECT * FROM user WHERE IDNumber='$id'";
  $result = $conn->query($query);
  if( $result->num_rows > 0 ) $errors['IDNUMBER_EXISTS'] = true;
  // echo $result->num_rows;
  $result->close();

  /* Check for unique email */
  $query = "SELECT * FROM user WHERE Email='$email'";
  $result = $conn->query($query);
  if( $result->num_rows > 0 ) $errors['EMAIL_EXISTS'] = true;
  // echo $result->num_rows;
  $result->close();

  if (!$errors['AFM_EXISTS'] and !$errors['IDNUMBER_EXISTS'] and !$errors['EMAIL_EXISTS']) {
    /* find IsFemale field's value */
    if ($sex == "Female") $isFemale = 1;
    else $isFemale = 0;

    /* insert user's details */
    $query = "INSERT INTO user(FirstName, LastName, FathersName, MothersName, DateOfBirth, BirthPlace, HomeAddress, PostalCode, AFM, IDNumber, PhoneNumber, Email, Password, IsFemale, IsSpecial) VALUES".
    "('$forname', '$surname', '$father', '$mother', '$date', '$place', '$home', '$postal', '$afm', '$id', '$phone', '$email', '$password', '$isFemale', '$special')";

    $result = $conn->query($query);

    /* set session variables */
    $query = sprintf("SELECT * FROM user WHERE Email = '%s' AND Password = '%s'", $email, $password);
    $result = $conn->query($query);
    // echo $result->num_rows;
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['user'] = true;
    $_SESSION['userID'] = $row['UserID'];
    $_SESSION['first_name'] = $forname;
    $_SESSION['last_name'] = $surname;
    $_SESSION['email'] = $email;
    $_SESSION['new_user'] = true;

    $result->close();

    /* insert user's default settings */
    $userID = $_SESSION['userID'];
    $query = "INSERT INTO settings(user_UserID, NotificationsOn, UpdatesOn, HistoryOn, AutoCompleteOn, MicrophoneOn, ZoomingOn, VocalGuidanceOn) VALUES"."('$userID',1,1,1,1,0,0,0)";
    $result = $conn->query($query);

    /* insert user's default information */
    $userID = $_SESSION['userID'];
    $query = "INSERT INTO information(user_UserID, YearsInsured, YearsEmployed, StampsCollected, AvgYearlySalary, InsuredChildren, IsRetired, YearlyPension, PensionType) VALUES"."('$userID',0,0,0,0,0,0,0,'Old age')";
    $result = $conn->query($query);

    $conn->close();

    /* redirect properly */
    $redirect_url = 'main.php';
    header('Location: ' . $redirect_url);
    exit();
  }
?>

<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Sign up Error</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signup.css">

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
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
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

        <!-- SIGN-UP ERROR PAGE CONTENT -->
        <?php
          if ($errors['AFM_EXISTS'] and $errors['IDNUMBER_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this AFM, ID-Number and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS'] and $errors['IDNUMBER_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this AFM and ID-Number already exists!</strong></div>
        <?php
          } else if ($errors['IDNUMBER_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this ID-Number and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this AFM and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this AFM already exists!</strong></div>
        <?php
          } else if ($errors['IDNUMBER_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this ID-Number already exists!</strong></div>
        <?php
          } elseif ($errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! A user with this email already exists!</strong></div>
        <?php
          }
        ?>

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
