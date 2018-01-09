<?php
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

    $query = "SELECT * FROM settings WHERE user_UserID = '$userID'";

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
      $notificationsOn = $row['NotificationsOn'];
      $updatesOn = $row['UpdatesOn'];
      $historyOn = $row['HistoryOn'];
      $autocompleteOn = $row['AutoCompleteOn'];
      $microphoneOn = $row['MicrophoneOn'];
      $zoomingOn = $row['ZoomingOn'];
      $vocalGuidanceOn = $row['VocalGuidanceOn'];

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

    <title>IKA Profile</title>
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
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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

        <!-- PROFILE PAGE CONTENT -->

        <div class="container">
      		<div class="row">
      			<div class="col-md-12" style="text-align:center">
      				<form action="profile_processing.php" method="post" onsubmit="return passwordsMatching()" id="signUpForm">
      					<input type="hidden" name="action" value="userProfile">
      					<br>
        				<h2><strong>Your profile</strong></h2>
                <p>You can modify your details, credentials and preferences as desired</p>

                <br>
                <p><strong>Details and Credentials</strong></p>
                <br>
                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>First Name</strong>
                      <input class="form-control" id="firstName" name="firstName" type="text" value="<?php echo $forname; ?>" required requiredMessage="Please enter your first name" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Second Name</strong>
                      <input class="form-control" id="secondName" name="secondName" type="text" value="<?php echo $surname; ?>" required requiredMessage="Please enter your second name" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Father's Name</strong>
                      <input class="form-control" id="fathersName" name="fathersName" type="text" value="<?php echo $father; ?>" required requiredMessage="Please enter your father\'s name" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Mother's Name</strong>
                      <input class="form-control" id="mothersName" name="mothersName" type="text" value="<?php echo $mother; ?>" required requiredMessage="Please enter your mother\'s name" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3">
                    <label for="dateOfBirth"><strong>Date of Birth</strong>
                      <input class="form-control" name="dateOfBirth" type="date" value="<?php echo $date; ?>" id="dateOfBirth">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Place of Birth</strong>
                      <input class="form-control" id="placeOfBirth" name="placeOfBirth" type="text" value="<?php echo $place; ?>" required requiredMessage="Please enter your place birth" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Home Address</strong>
                      <input class="form-control" id="homeAddress" name="homeAddress" type="text" value="<?php echo $home; ?>" required requiredMessage="Please enter your home address" pattern=".{1,45}">
                    </label>
                  </div>

                  <div class="col-md-3 form-group">
                    <label><strong>Sex</strong>
                      <br>
                      <div class="btn-group" data-toggle="buttons">
                        <?php
                          if ($isFemale) {
                            echo '<label class="btn btn-secondary active">';
                            echo '<input type="radio" name="sex" id="male"  value="Male"> Male';
                            echo '</label>';
                            echo '<label class="btn btn-secondary">';
                            echo '<input type="radio" name="sex" id="male" value="Female" checked>Female';
                            echo'</label>';
                          }
                          else {
                            echo '<label class="btn btn-secondary active">';
                            echo '<input type="radio" name="sex" id="male"  value="Male" checked> Male';
                            echo '</label>';
                            echo '<label class="btn btn-secondary">';
                            echo '<input type="radio" name="sex" id="male" value="Female">Female';
                            echo'</label>';
                          }
                        ?>
                      </div>
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Postal Code</strong>
                      <input class="form-control" id="postalCode" name="postalCode" type="text" value="<?php echo $postal; ?>" required requiredMessage="Please enter your postal code" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
          					<label><strong>AFM</strong>
                      <input class="form-control" id="AFM" name="AFM" type="text" value="<?php echo $afm; ?>" required requiredMessage="Please enter your AFM" pattern=".{1,45}">
                    </label>
          				</div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>ID Number</strong>
                      <input class="form-control" id="IDNumber" name="IDNumber" type="text" value="<?php echo $id; ?>" required requiredMessage="Please enter your ID number" pattern=".{1,45}">
                    </label>
          				</div>
          				<div class="col-md-3 form-group">
                    <label><strong>Phone Number</strong>
                      <input class="form-control" id="phone" name="phone" type="tel" value="<?php echo $phone; ?>" required requiredMessage="Please enter your phone number" pattern=".{1,45}">
                    </label>
          				</div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-6">
                  <label for="email"><strong>Email</strong>
                    <input class="form-control" id="email" name="email" type="email" value="<?php echo $email; ?>" required requiredMessage="Please enter your email" pattern=".{1,45}">
                  </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label><strong>Password</strong>
                      <input class="form-control" id="password" name="password" type="password" value="<?php echo $password; ?>" required requiredMessage="Please enter your password" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label><strong>Confirm Password</strong>
                      <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required requiredMessage="Please confirm your password" pattern=".{1,45}">
                    </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <br>
                <p><strong>Notifications and Updates</strong></p>
                <div class="row">
                  <div class="form-check col-md-6 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="notifications" <?php if ($notificationsOn) echo "checked"; ?> data-toggle="tooltip" data-placement="bottom" title="You will be notified for matters concerning your applications, questions, appointments etc.">
                      I want to receive account related notifications by email
                    </label>
                  </div>
                  <div class="form-check col-md-6 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="updates" <?php if ($updatesOn) echo "checked"; ?> data-toggle="tooltip" data-placement="bottom" title="You will be updated for general matters concerning all IKA clients.">
                      I want to receive updates concerning IKA by email
                    </label>
                  </div>
                </div>

                <br>
                <p><strong>History and action-tracking</strong></p>
                <div class="row">
                  <div class="form-check col-md-6 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="history" <?php if ($historyOn) echo "checked"; ?>  data-toggle="tooltip" data-placement="bottom" title="This history is going to remain strictly confidential and available only to you.">
                      I want a complete history of my actions to be kept
                    </label>
                  </div>
                  <div class="form-check col-md-6 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="autocomplete" <?php if ($autocompleteOn) echo "checked"; ?>  data-toggle="tooltip" data-placement="bottom" title="For this we will need to monitor your actions, to be able to help you. Your data is going to remain strictly confidential and available only to you.">
                      I want auto-complete in my forms
                    </label>
                  </div>
                </div>

                <br>
                <p><strong>Special assistance</strong></p>
                <div class="row">
                  <div class="form-check col-md-4 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="microphone" <?php if ($microphoneOn) echo "checked"; ?> data-toggle="tooltip" data-placement="bottom" title="This way you can ask questions and our specialized software will be able to assist you.">
                      Turn microphone on when I log-in
                    </label>
                  </div>
                  <div class="form-check col-md-4 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="zooming" <?php if ($zoomingOn) echo "checked"; ?> data-toggle="tooltip" data-placement="bottom" title="When your cursor remains inert for more than 3 seconds, we are going to zoom-in to where it points.">
                      Zoom-in when my cursor focuses
                    </label>
                  </div>
                  <div class="form-check col-md-4 form-group">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="vocalGuidance" <?php if ($vocalGuidanceOn) echo "checked"; ?> data-toggle="tooltip" data-placement="bottom" title="When you remain inert for more than 10 seconds, our specialized software will automatically step-in to assist you.">
                      Vocal guidance after prolongued inertia
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
        <script>
          function passwordsMatching() {
            var pass1 = document.getElementById("password").value;
            var pass2 = document.getElementById("confirmPassword").value;
            var ok = true;
            if (pass1 != pass2) {
              //alert("Passwords Do not match");
              document.getElementById("password").style.borderColor = "#E34234";
              document.getElementById("confirmPassword").style.borderColor = "#E34234";
              ok = false;
              alert("Passwords don't match!");
            }
            // else {
            //   alert("Passwords Match!!!");
            // }
            return ok;
          }
        </script>

  </body>

</html>
