<?php
    session_start();

    /* determine redirection's URL */
    $redirect_url = strpos($_SESSION['redirect_url'], 'profile.php') !== false ? 'main.php' : $_SESSION['redirect_url'];

    /* Unset session variables */
    $_SESSION = array();

    /* Destroy the whole session, not just the session data */
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    /* redirect properly */
    header('Location: ' . $redirect_url);
?>
