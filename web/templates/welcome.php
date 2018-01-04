<!DOCTYPE html>
<?php
  require_once 'db_connection.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die ($conn->connect_error);

  function checkDetailsUniqueness($conn, $AFM, $IDNumber, $email) {
    /* initialize error message */
    $err = "";
    /* Check for unique AFM */
    $query = "SELECT count(AFM) FROM user WHERE AFM='$AFM'";

    $result = $conn->query($query);

    if( $result->num_rows > 0 ) {
      // die( "There is already a user with that AFM!" );
      $err .= "There is already a user with that AFM";
    }//end if

    /* Check for unique IDNumber */
    $query = "SELECT count(IDNumber) FROM user WHERE IDNumber='$IDNumber'";

    $result = $conn->query($query);

    if( $result->num_rows > 0 ) {
      // die( "There is already a user with that IDNumber!" );
      if ($err == "") $err .= "There is already a user with that IDNumber";
      else $err .= ", IDNumber";
    }//end if

    /* Check for unique email */
    $query = "SELECT count(Email) FROM user WHERE Email='$email'";

    $result = $conn->query($query);

    if( $result->num_rows > 0 ) {
      // die( "There is already a user with that email!" );
      if ($err == "") $err .= "There is already a user with that email";
      else $err .= " and email";
    }//end if

    if ($err != "") $err .= "!";

    return $err;
  }
?>

<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Welcome</title>
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
              <a class="nav-link" href="#">Log In</a>
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
      <div class="container">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Insurance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Retirement</a>
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
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <hr>
        </div>

        <!-- SIGN-UP RESULT PAGE CONTENT -->
        <?php
          $name = isset($_POST['firstName']) ? $_POST['firstName'] : '';
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
          $retired = 0;
          $special = 0;

          $err = checkDetailsUniqueness($conn, $afm, $id, $email);

          if ($err != "") {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center"> <strong>Problem! </strong>';
            echo $err;
            echo '</div>';
          }
          else {
            /* find IsFemale field's value */
            if ($sex == "Female") $isFemale = 1;
            else $isFemale = 0;

            $query = "INSERT INTO user(FirstName, LastName, FathersName, MothersName, DateOfBirth, BirthPlace, HomeAddress, PostalCode, AFM, IDNumber, PhoneNumber, Email, Password, IsFemale, IsRetired, IsSpecial) VALUES".
            "('$name', '$surname', '$father', '$mother', '$date', '$place', '$home', '$postal', '$afm', '$id', '$phone', '$email', '$password', '$isFemale', '$retired', '$special')";

            $result = $conn->query($query);
            if (!$result) {
              echo '<h2 style="text-align:center">Sign-up was unsuccesful!</h2>';
              $conn->error;
            }
            else {
              echo '<h2 style="text-align:center">Welcome to IKA!</h2>';
            }

            $conn->close();
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
