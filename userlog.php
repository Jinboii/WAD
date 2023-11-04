<?php
   header("Access-Control-Allow-Origin: *");
   session_start();
   
   $userid = $_SESSION["userid"] ; 
   $usertype = $_SESSION["usertype"];
   
   $processed_data = [];
   array_push($processed_data,["userid"=> $userid,"usertype"=> $usertype]);
   $jsonObj = json_encode($processed_data);
   echo $jsonObj;
?>