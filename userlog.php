<?php
   header("Access-Control-Allow-Origin: *");
   // session_start();
   
   // $userid = $_SESSION["userid"] ; 
   // $usertype = $_SESSION["usertype"];
   
   $userid = "1234";
   $usertype = "user";

   $processed_data = [];
   array_push($processed_data,["userid"=> $userid,"usertype"=> $usertype]);
   $jsonObj = json_encode($processed_data);
   echo $jsonObj;
?>