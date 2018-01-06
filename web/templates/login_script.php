<?php
  include 'make_connection.php';

  /* start a new session */
  session_start();

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $query = sprintf("SELECT * FROM user WHERE Email = '%s' AND Password = '%s'", $email, $password);

  $result = $conn->query($query);
  if (!$result) {
    $_SESSION['login_error'] = true;
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
  $redirect_url = 'main.php';
  header('Location: ' . $redirect_url);
?>
