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

        <!-- CALCULATION PAGE CONTENT - Pension calculation scenario -->

        <div class="container">
      		<div class="row">
      			<div class="col-sm-12" style="text-align:center">
      				<form action="***" method="post" id="logInForm">
      					<input type="hidden" name="action" value="userLogIn">
      					<br>
        				<h2><strong>Basic Pension Calculator</strong></h2>
                <p>Please insert your details</p>

                <div class="row">
                  <label for="dateOfBirth" class="col-3 col-form-label">Date of Birth</label>
                  <div class="col-md-3">
                    <input class="form-control" type="date" value="1980-08-19" id="dateOfBirth">
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
                  <div class="col-md-4 form-group">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pension Type
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <input class="dropdown-item" type="radio" name="pension" value="old" checked>Old age</button>
                        <input class="dropdown-item" type="radio" name="pension" value="disabled">Disability</button>
                        <input class="dropdown-item" type="radio" name="pension" value="insured">Death of insured</button>
                        <input class="dropdown-item" type="radio" name="pension" value="retired">Death of retired</button>
                      </div>
                    </div>
          				</div>
                  <div class="col-md-4 form-group">
          					<label>
          						<input class="form-control" id="daysOfEmployment" name="daysOfEmployment" type="number" placeholder="Days of employment" min="0" required requiredMessage="Please enter your days of employment" pattern=".{1,45}">
          					</label>
          				</div>
                  <div class="col-md-4 form-group text-center">
          					<label>
          						<input class="form-control" id="avgReceivingsPerYear" name="avgReceivingsPerYear" type="number" min="0" step="0.01" placeholder="Avg yearly receivings" required requiredMessage="Please enter your average receivings per year" pattern=".{1,45}">
          					</label>
          				</div>
                </div>

                <br>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <button type="reset" class="btn btn-outline-danger">Clear</button>
                  </div>
                  <div class="col-md-6 form-group">
            				<input class="btn btn-primary" type="submit" value="Calculate">
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
