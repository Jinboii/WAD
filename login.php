<?php
session_start();

require_once 'loginDAO.php';

// Assume login.html has a form that submits data to this script via POST
if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $loginDAO = new LoginDAO();
    $isLoginSuccess = $loginDAO->checkLogin($_POST['username'], $_POST['password']);

    if ($isLoginSuccess) {
        // Redirect to a logged-in page
        $_SESSION["userid"] = $_POST['username'];
        $_SESSION["usertype"] = "user";
        header("Location: index.html");
    } else {
        // Redirect back to the login page with an error
        header("Location: login.html?error=login_failed");
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: login.html");
}
