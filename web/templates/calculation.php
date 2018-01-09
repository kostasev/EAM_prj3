<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Calculation</title>
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

        <!-- CALCULATION PAGE CONTENT - Pension calculation scenario -->
        <div class="container">
          <div class="row">
            <!-- CALCULATION FORM -->
        		<div class="col-md-12" style="text-align:center">
        			<form action="calculation_result.php" method="post" id="logInForm">
        				<input type="hidden" name="action" value="userLogIn">
        				<br>
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
                          <input type="radio" name="sex" id="male"  value="Male" checked> Male
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="sex" id="male" value="Female">Female
                        </label>
                      </div>
                    </label>
                  </div>

                  <div class="col-md-2 form-group">
                    <label><strong>Pension Type</strong>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="type" id="old"  value="old" checked>Old age
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="type" id="disabled" value="disabled">Disability
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="type" id="insured" value="insured">Death of insured
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="type" id="retired" value="retired" >Death of retired
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
          						<input class="form-control" id="yearsOfEmployment" name="yearsOfEmployment" type="number" placeholder="Must be positive number" min="0" required requiredMessage="Please enter your years of employment" pattern=".{1,45}">
          					</label>
          				</div>

                  <div class="col-md-6 form-group text-center">
          					<label><strong>Average receivings per year</strong>
          						<input class="form-control" id="avgReceivingsPerYear" name="avgReceivingsPerYear" type="number" min="0" step="0.01" placeholder="Must be positive number" required requiredMessage="Please enter your average receivings per year" pattern=".{1,45}">
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
