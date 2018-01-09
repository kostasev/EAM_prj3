<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA Sign Up</title>
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

        <!-- SIGN-UP PAGE CONTENT -->

        <div class="container">
      		<div class="row">
      			<div class="col-md-12" style="text-align:center">
      				<form action="signup_processing.php" method="post" onsubmit="return passwordsMatching()" id="signUpForm">
      					<input type="hidden" name="action" value="userSignUp">
      					<br>
        				<h2><strong>Sign-up</strong></h2>
                <p>Please insert your details and your credentials</p>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First name" required requiredMessage="Please enter your first name" pattern=".{1,45}">
          				  </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="secondName" name="secondName" type="text" placeholder="Second name" required requiredMessage="Please enter your second name" pattern=".{1,45}">
          				  </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="fathersName" name="fathersName" type="text" placeholder="Father's name" required requiredMessage="Please enter your father's name" pattern=".{1,45}">
          				  </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="mothersName" name="mothersName" type="text" placeholder="Mother's name" required requiredMessage="Please enter your mother's name" pattern=".{1,45}">
          				  </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <label for="dateOfBirth" class="col-md-1 col-form-label">Date of Birth</label>
                  <div class="col-md-3">
                    <input class="form-control" name="dateOfBirth" type="date" value="1980-08-19" id="dateOfBirth">
                  </div>
                  <div class="col-md-2 form-group">
                    <label>
                      <input class="form-control" id="placeOfBirth" name="placeOfBirth" type="text" placeholder="Enter place of birth" required requiredMessage="Please enter your place birth" pattern=".{1,45}">
          				  </label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="homeAddress" name="homeAddress" type="text" placeholder="Home address" required requiredMessage="Please enter your home address" pattern=".{1,45}">
          					</label>
                  </div>
                  <div class="col-md-3 form-group">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sex
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <input type="radio" name="sex" value="Male" checked>Male</button>
                        <input type="radio" name="sex" value="Female">Female</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="postalCode" name="postalCode" type="text" placeholder="Postal code" required requiredMessage="Please enter your postal code" pattern=".{1,45}">
          					</label>
                  </div>
                  <div class="col-md-3 form-group">
          					<label>
          						<input class="form-control" id="AFM" name="AFM" type="text" placeholder="AFM" required requiredMessage="Please enter your AFM" pattern=".{1,45}">
          					</label>
          				</div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
          						<input class="form-control" id="IDNumber" name="IDNumber" type="text" placeholder="ID number" required requiredMessage="Please enter your ID number" pattern=".{1,45}">
          					</label>
          				</div>
          				<div class="col-md-3 form-group">
                    <label>
          						<input class="form-control" id="phone" name="phone" type="tel" placeholder="Phone number" required requiredMessage="Please enter your phone number" pattern=".{1,45}">
          					</label>
          				</div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <label for="email" class="col-md-3 col-form-label">Email</label>
                  <div class="col-md-3">
                    <input class="form-control" id="email" name="email" type="email" value="joedoe@somemail.com" required requiredMessage="Please enter your email" pattern=".{1,45}">
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password" required requiredMessage="Please enter your password" pattern=".{1,45}">
          			    </label>
                  </div>
                  <div class="col-md-3 form-group">
                    <label>
                      <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required requiredMessage="Please confirm your password" pattern=".{1,45}">
          					</label>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>

                <br>
                <div class="row">
                  <div class="col-md-3 form-group"></div>
                  <div class="col-md-3 form-group">
                    <button type="reset" class="btn btn-outline-danger">Clear</button>
                  </div>
                  <div class="col-md-3 form-group">
            				<input class="btn btn-primary" type="submit" value="Sign-up">
                    <br> <br>
                  </div>
                  <div class="col-md-3 form-group"></div>
                </div>
                <p><a href="./login.html">Just remembered that you already have an account?</a></p>
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
