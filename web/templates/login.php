<?php
  session_start();

  if (isset($_SESSION['user'])) {
    /* user is currently logged-in */
    /* redirect properly */
    $redirect_url = 'access_error.php';
    header('Location: ' . $redirect_url);
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

    <?php
      if (isset($_SESSION['login_error']) and $_SESSION['login_error']) {
        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
          <strong>Invalid credentials!</strong> There is no user with the details that you entered.
        </div>";
        $_SESSION['login_error'] = false;
      }
    ?>

  </head>
  <body>

      <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-2"></div>
        <div>
          <a class="navbar-brand" href="index.php"><img src="../images/ikalogo.png" style="width:120px;" alt="logo"></a>
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
            <li class="breadcrumb-item"><a href="index.php">IKA</a></li>
            <li class="breadcrumb-item"><a href="#">Log-In</a></li>
          </ol>
        </nav>
      </div>

        <!-- LOG-IN PAGE CONTENT -->

        <div class="container">
      		<div class="row">
      			<div class="col-sm-12" style="text-align:center">
      				<form action="login_script.php" method="post" id="logInForm">
      					<input type="hidden" name="action" value="userLogIn">
      					<br>
        				<h2><strong>Log-in</strong></h2>
                <p>Please insert your credentials</p>

                <div>
        					<label>
        						<input class="form-control" id="email" name="email" type="email" placeholder="your email" required requiredMessage="Please enter your email">
        					</label>
        				</div>
        				<div>
        					<label>
        						<input class="form-control" id="password" name="password" type="password" placeholder="your password" required requiredMessage="Please enter your password">
        					</label>
        				</div>

                <br>
        				<input class="btn btn-primary" type="submit" value="Log-in">
                <br> <br>
                <p><a href="./signup.php">Don't have an account?</a></p>
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
