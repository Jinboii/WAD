<?php
    header("Access-Control-Allow-Origin: *");
    require_once "autoload.php";
     
    $dao = new PostDAO(); 
    $posts = $dao->retrieveAll();
    $temp_data = [];
    $processed_data = [];
    foreach ($posts as $post) {
        $postid = $post->getpostID();
        $posttitle = $post->getpostTitle();
        $postcontent = $post->getpostContent();
        $userid = $post->getuserID();
        array_push($temp_data, ["postid" => $postid, "posttitle" => $posttitle, "postcontent" => $postcontent, "userid" => $userid]);
    }
    $processed_data = array_reverse($temp_data);
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>
