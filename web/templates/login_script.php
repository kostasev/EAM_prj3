<?php
  /* start a new session */
  session_start();

  include 'make_connection.php';

  $redirect_url = 'main.php';

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";

  $result = $conn->query($query);
  if ($result->num_rows == 0) {
    $_SESSION['login_error'] = true;
    $redirect_url = 'login.php';
  }
  else {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['user'] = true;
    $_SESSION['userID'] = $row['UserID'];
    $_SESSION['first_name'] = $row['FirstName'];
    $_SESSION['last_name'] = $row['LastName'];
    $_SESSION['email'] = $row['Email'];
  }

  $result->close();
  $conn->close();

  /* we are an intermediate page for a user that needs to be logged-in to use some service,
    send a request or receive a cetificate */
  if (isset($_SESSION['intermediate']) and $_SESSION['intermediate'] and !$_SESSION['login_error']) {
    $redirect_url = $_SESSION['intermediate_for'];
    $_SESSION['intermediate'] = false;
  }

  /* redirect properly */
  header('Location: ' . $redirect_url);
?>
