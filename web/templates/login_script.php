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

  /* redirect properly */
  header('Location: ' . $redirect_url);
?>
