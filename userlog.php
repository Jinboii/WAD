<?php
   header("Access-Control-Allow-Origin: *");
   session_start();

   //test commit
   // to draw the user id and type from session
   $userid = "1234"; 
   $usertype = "user";  //change here to test for org and indiv

   $processed_data = [];
   array_push($processed_data,["userid"=> $userid,"usertype"=> $usertype]);
   $jsonObj = json_encode($processed_data);
   echo $jsonObj;
?>