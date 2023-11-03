<?php
    header("Access-Control-Allow-Origin: *");
    session_unset();
    header('Location: user_login.html?success');
    exit();
?>