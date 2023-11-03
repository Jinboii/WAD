<?php
    header("Access-Control-Allow-Origin: *");
    session_unset();
    header('Location: successlogout.html');
    exit();
?>