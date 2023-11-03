<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    $_SESSION = [];
    header('Location: login.html?success');
    exit();
?>