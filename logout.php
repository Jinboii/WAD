<?php
    header("Access-Control-Allow-Origin: *");
    session_unset();
    header('Location: login.html?success');
    exit();
?>