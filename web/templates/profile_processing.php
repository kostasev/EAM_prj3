<!DOCTYPE html>
<?php
  session_start();

  include 'make_connection.php';

  /* errors array */
  $errors = array('EMAIL_EXISTS' => false,
                  'AFM_EXISTS' => false,
                  'IDNUMBER_EXISTS' => false);

  /* gather user's details */
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

  /* gather user's settings */
  $notificationsOn = isset($_POST['notifications']) ? 1 : 0;
  $updatesOn =  isset($_POST['updates']) ? 1 : 0;
  $historyOn =  isset($_POST['history']) ? 1 : 0;
  $autocompleteOn =  isset($_POST['autocomplete']) ? 1 : 0;
  $microphoneOn =  isset($_POST['microphone']) ? 1 : 0;
  $zoomingOn =  isset($_POST['zooming']) ? 1 : 0;
  $vocalGuidanceOn =  isset($_POST['vocalGuidance']) ? 1 : 0;

  $userID = $_SESSION['userID'];
  /* debugging */
  // echo $userID; echo "\n";

  /* Check for unique AFM */
  $query = "SELECT * FROM user WHERE AFM=\"$afm\" AND UserID != '$userID'";
  /* debugging */
  // echo $query; echo "\n";
  $result = $conn->query($query);
  if($result->num_rows > 0) $errors['AFM_EXISTS'] = true;
  // /* debugging */
  // echo $result->num_rows;
  // $result->close();

  /* Check for unique IDNumber */
  $query = "SELECT * FROM user WHERE IDNumber=\"$id\" AND UserID != '$userID'";
  /* debugging */
  // echo $query; echo "\n";
  $result = $conn->query($query);
  if($result->num_rows > 0) $errors['IDNUMBER_EXISTS'] = true;
  // /* debugging */
  // echo $result->num_rows;
  // $result->close();

  /* Check for unique email */
  $query = "SELECT * FROM user WHERE Email=\"$email\" AND UserID != '$userID'";
  /* debugging */
  // echo $query; echo "\n";
  $result = $conn->query($query);
  if($result->num_rows > 0) $errors['EMAIL_EXISTS'] = true;
  // /* debugging */
  // echo $result->num_rows;
  // $result->close();

  if (!$errors['AFM_EXISTS'] and !$errors['IDNUMBER_EXISTS'] and !$errors['EMAIL_EXISTS']) {
    /* find IsFemale field's value */
    if ($sex == "Female") $isFemale = 1;
    else $isFemale = 0;

    /* update user's details */
    $query = "UPDATE user SET FirstName = \"$forname\", LastName = \"$surname\", FathersName = \"$father\", MothersName = \"$mother\", DateOfBirth = \"$date\", BirthPlace = \"$place\", HomeAddress = \"$home\", PostalCode = \"$postal\", AFM = \"$afm\", IDNumber = \"$id\", PhoneNumber = \"$phone\", Email = \"$email\", Password = \"$password\", IsFemale = \"$isFemale\" WHERE UserID = '$userID'";
    /* debugging */
    // echo $query; echo "\n";

    $result = $conn->query($query);

    /* update user's settings */
    $query = "UPDATE settings SET NotificationsOn = \"$notificationsOn\", UpdatesOn = \"$updatesOn\", HistoryOn = \"$historyOn\", AutoCompleteOn = \"$autocompleteOn\", MicrophoneOn = \"$microphoneOn\", ZoomingOn = \"$zoomingOn\", VocalGuidanceOn = \"$vocalGuidanceOn\" WHERE user_UserID = '$userID'";
    /* debugging */
    // echo $query; echo "\n";

    $result = $conn->query($query);

    /* reset session variables */
    $query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($query);

    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['user'] = true;
    $_SESSION['userID'] = $row['UserID'];
    $_SESSION['first_name'] = $row['FirstName'];
    $_SESSION['last_name'] = $row['LastName'];
    $_SESSION['email'] = $row['Email'];

    /* debugging */
    // echo $_SESSION['first_name']; echo "\n";

    $result->close();
    $conn->close();

    /* redirect properly */
    $redirect_url = 'profile.php';
    header('Location: ' . $redirect_url);
    exit();
  }

  $conn->close();
?>

<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Profile Update Error</title>
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

      <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="main.php">IKA</a></li>
              <li class="breadcrumb-item"><a href="#">IKA Profile</a></li>
              <li class="breadcrumb-item"><a href="#">Update</a></li>
            </ol>
          </nav>
        </div>

        <!-- SIGN-UP ERROR PAGE CONTENT -->
        <?php
          if ($errors['AFM_EXISTS'] and $errors['IDNUMBER_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this AFM, ID-Number and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS'] and $errors['IDNUMBER_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this AFM and ID-Number already exists!</strong></div>
        <?php
          } else if ($errors['IDNUMBER_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this ID-Number and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS'] and $errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this AFM and email already exists!</strong></div>
        <?php
          } else if ($errors['AFM_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this AFM already exists!</strong></div>
        <?php
          } else if ($errors['IDNUMBER_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this ID-Number already exists!</strong></div>
        <?php
          } else if ($errors['EMAIL_EXISTS']) {
        ?>
          <div class="alert alert-danger" role="alert" style="text-align:center"><strong>Problem! A user with this email already exists!</strong></div>
        <?php
          } else {
        ?>
          <div class="alert alert-success" role="alert" style="text-align:center"><strong>Success! Profile updated successfully!</strong></div>
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
