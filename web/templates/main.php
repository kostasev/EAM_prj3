<?php
  include 'make_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../images/toplogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>IKA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">

    <?php
      if (isset($_SESSION['user']) and isset($_SESSION['new_user']) and $_SESSION['new_user']) {
    ?>
    <script>
      $(document).ready(function(){
          var message = "Sign-up was successful!";
          $('#profile').tooltip({title: message, trigger: 'manual'}).tooltip("show");
      });
      $(document).click(function(e) {
         $('#profile').tooltip("destroy");
      });
    </script>
    <?php
        $_SESSION['new_user'] = false;
      }
      if (isset($_SESSION['login_error']) and $_SESSION['login_error']) {
    ?>
    <script>
      $(document).ready(function(){
          var message = "Your credentials were wrong!";
          $('#login-btn').removeAttr('data-container');
          $('#login-btn').addClass('danger-tooltip');
          $('#login-btn').tooltip({title: message, trigger: 'manual', animation: false}).tooltip("show");
      });
      $(document).on('click', function (e) {
         $('#login-btn').tooltip('destroy');
         $('#login-btn').attr('data-container', 'body');
      });
    </script>
    <?php
      }
      $_SESSION['login_error'] = false;

      $conn->close();
    ?>

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
        <div class="container">
          <div class="row">
            <div class="col-md-6">

              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <a href="#">
                      <img class="d-block img-fluid" src="../images/sun5.jpg" alt="First slide">
                      <div class="carousel-caption d-block bg-primary d-md-block">
                        <h3>New Pension Scheme</h3>
                        <p>See what changes brings the new law enforcement<span class="badge badge-default">Retirement</span></p>
                      </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <a href="#">
                      <img class="d-block img-fluid" src="../images/apd5.jpg" alt="Second slide">
                      <div class="carousel-caption d-block bg-primary d-md-block">
                        <h3>Time Extension for December's Analytic Periodic Report<span class="badge badge-default">New</span></h3>
                        <p>Deadline set at late January 2018<span class="badge badge-default">Employers</span></p>
                      </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <a href="#">
                      <img class="d-block img-fluid" src="../images/koin5.jpg" alt="Third slide">
                      <div class="carousel-caption d-block bg-primary d-md-block">
                        <h3>New Social subsidy criteria</h3>
                        <p>See if you are qualified<span class="badge badge-default">All</span></p>
                      </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <a href="#">
                      <img class="d-block img-fluid" src="../images/eis5.jpg" alt="Third slide">
                      <div class="carousel-caption d-block bg-primary d-md-block">
                        <h3>Extra Insurance Contribution</h3>
                        <p>Calculate your bounty<span class="badge badge-default">Insurance</span></p>
                      </div>
                    </a>
                  </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>
          <div class="col-md-6">
            <div class="row">
              <div class="card-deck">
                <div class="card card-inverse">
                  <img class="card-img" src="../images/2.jpg" alt="Card image cap" height="250" width="250">
                  <div class="card-img-overlay">
                    <a href="#" class="btn btn-secondary ">Insurance</a>
                  </div>
                </div>
                <div class="card card-inverse">

                  <img class="card-img" src="../images/1.jpg" alt="Card image cap" height="250" width="250">
                  <div class="card-img-overlay">
                    <a href="#" class="btn btn-secondary ">Retirement</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row"></div>
            <div class="row">
              <div class="card-deck">
                <div class="card card-inverse">
                  <img class="card-img" src="../images/3.jpeg" alt="Card image cap" height="250" width="250">
                  <div class="card-img-overlay">
                     <a href="#" class="btn btn-secondary ">Employers</a>
                  </div>
                </div>
                <div class="card card-inverse">
                  <img class="card-img" src="../images/4.jpg" alt="Card image cap" height="250" width="250">
                  <div class="card-img-overlay">
                     <a href="#" class="btn btn-secondary ">Disability</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <hr>
        <div class="row" style="background-color: #d6d6d6;">
            <h3 style=" padding-top: 15px; padding-left: 20px;">Applications</h3>
        </div>
        <div class="row" style="background-color: #d6d6d6;">
          <!-- <div class="col-md-2"></div> -->
          <div class="col-md-3">
            <a href="#">
              <img src="../images/doc.png"/>
            </a>
            <h4 style="padding-top: 15px; padding-left: 30px;">Appointments</h4>
            <p style="padding-left: 10px;">Are you feeling weird lately? Don't wait any longer! Schedule an appointment with a doctor or a specialist.</p>
          </div>
          <div class="col-md-3">
            <a href="calculation.php">
              <img src="../images/calc.png"/>
            </a>
            <h4 style="padding-top: 15px; padding-left: 15px;">Pension Calculator</h4>
            <p style="padding-left: 10px;">Are you about to retire or you just want to plan ahead? Calculate your pension.</p>
          </div>
          <div class="col-md-3">
            <a href="#">
              <img src="../images/job.png"/>
            </a>
            <h4 style="padding-top: 15px;">Employment Program</h4>
            <p>Thoudands of lives change every month! Learn more about our employment program.</p>
          </div>
          <div class="col-md-3">
            <a target="_blank" href="http://www.amka.gr/">
              <img src="../images/amka.png"/>
            </a>
            <h4 style="padding-top: 15px; padding-left: 30px;">Obtain AMKA</h4>
            <p style="padding-left: 5px;">Do you want to obtain a "Social Insurance Record Number" (AMKA)? It takes just a few steps, it lasts a lifetime.</p>
          </div>
          <!-- <div class="col-md-2"></div> -->
          <hr>
       </div>
       <hr>
      </div>

      <!-- FOOTER -->
      <footer class="footer" style="background-color: #ffffff;padding-top: 50px;">
        <div class="container" >
          <div class=row>
          <div class="col-md-2">
            <img src="../images/ika_logo.png" style="width:120px;" alt="logo" >
          </div>
           <div class="col-md-2">
            <h4>About Us</h4>
            <a href="#"><p style="margin-bottom: 3px;">About</p></a>
            <a href="#"><p style="margin-bottom: 3px;">Legislation</p></a>
            <a href="#"><p style="margin-bottom: 3px;">News</p></a>
            <a href="#"><p style="margin-bottom: 3px;">Services</p></a>
            <a href="#"><p style="margin-bottom: 3px;">FAQ</p></a>
          </div>
          <div class="col-md-2">
            <h4>Contact Us</h4>
            <p>tel  : 210 8898985 <br/>
              fax: 210 8898900 <br/>
            email: info@ika.gr</p>
          </div>
          <div id="map" class="col-md-6" style="width:800px;height:400px;background:yellow"></div>
            <script>
              function initMap() {
                var uluru = {lat: 37.999483, lng: 23.736761};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 10,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
              </script>
        </div>

        </div>
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
