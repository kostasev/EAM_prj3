<?php
  /* user must be logged-in to use this page */
  session_start();

  if (!isset($_SESSION['user'])) {
    /* we have an access error */
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

    <title>IKA Retirement Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/request.css">

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

        <!-- REQUEST PAGE CONTENT -->

        <div class="container">
          <div class="col-md-12">
            <div class="row">

              <!-- SIDE MENU -->
              <div class="col-md-2">
                <ul class="nav inner-nav1 flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Insured</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Retired</a>
                    <ul class="nav inner-nav2 flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="calculation.php">Pension Calculator</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Employers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Special Abilities</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Doctor Appointment</a>
                  </li>
                </ul>
              </div>

              <!-- REQUEST FORM -->
              <div class="col-md-10" style="text-align:center">
        				<form action="request_reply.php" method="post" id="signUpForm">
        					<input type="hidden" name="action" value="userProfile">
        					<br>
                  <h2><strong>Retirement request</strong></h2>
                  <p>Please verify that your details are correct and proceed</p>

                  <br>
                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <div class="col-md-3 form-group">
                      <label>
                        <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First name FROM DATABASE" required requiredMessage="Please enter your first name" pattern=".{1,45}">
            				  </label>
                    </div>
                    <div class="col-md-3 form-group">
                      <label>
                        <input class="form-control" id="secondName" name="secondName" type="text" placeholder="Second name FROM DATABASE" required requiredMessage="Please enter your second name" pattern=".{1,45}">
            				  </label>
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <div class="col-md-3 form-group">
                      <label>
                        <input class="form-control" id="fathersName" name="fathersName" type="text" placeholder="Father's name FROM DATABASE" required requiredMessage="Please enter your father's name" pattern=".{1,45}">
            				  </label>
                    </div>
                    <div class="col-md-3 form-group">
                      <label>
                        <input class="form-control" id="mothersName" name="mothersName" type="text" placeholder="Mother's name FROM DATABASE" required requiredMessage="Please enter your mother's name" pattern=".{1,45}">
            				  </label>
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                  <div class="col-md-3 form-group"></div>
                    <div class="col-md-3 form-group">
                      <label>
                        <input class="form-control" id="homeAddress" name="homeAddress" type="text" placeholder="Home address FROM DATABASE" required requiredMessage="Please enter your home address" pattern=".{1,45}">
            					</label>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          DB_Sex
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                          <button class="dropdown-item" type="button">Male</button>
                          <button class="dropdown-item" type="button">Female</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <label for="dateOfBirth" class="col-md-3 col-form-label">***Date of Birth FROM DATABASE***</label>
                    <div class="col-md-3">
                      <input class="form-control" type="date" value="1980-08-19" id="dateOfBirth">
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <label for="email" class="col-md-3 col-form-label">AFM</label>
                    <div class="col-md-3">
                      <input class="form-control" type="text" value="FETCH_AFM_FROM_DATABASE" id="AFM">
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <label for="email" class="col-md-3 col-form-label">ID Number</label>
                    <div class="col-md-3">
                      <input class="form-control" type="text" value="FETCH_IDNUMBER_FROM_DATABASE" id="IDNumber">
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <label for="email" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-3">
                      <input class="form-control" type="email" value="FETCH_EMAIL@FROM.DATABASE" id="email">
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group">
                      <label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" required requiredMessage="Please enter your password" pattern=".{1,45}">
            			    </label>
                    </div>
                    <div class="col-md-4 form-group"></div>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-md-3 form-group"></div>
                    <div class="col-md-3 form-group">
                      <button type="button" class="btn btn-outline-danger">Clear</button>
                    </div>
                    <div class="col-md-3 form-group">
              				<input class="btn btn-primary" type="submit" value="Proceed">
                      <br> <br>
                    </div>
                    <div class="col-md-3 form-group"></div>
                  </div>
                </form>
              </div>

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
