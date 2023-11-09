<?php
   header("Access-Control-Allow-Origin: *");
   session_start();

   
   $userid = "";
   $usertype = "";

   if (isset($_SESSION["userid"])) {
      $userid = $_SESSION["userid"] ; 
   }

   if (isset($_SESSION["usertype"])) {
      $usertype = $_SESSION["usertype"];
   }

   
   $processed_data = [];
   array_push($processed_data,["userid"=> $userid,"usertype"=> $usertype]);
   $jsonObj = json_encode($processed_data);
   echo $jsonObj;
?>