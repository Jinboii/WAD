<?php
    require_once "autoload.php";
    $userid = 1234; 
    $dao = new PostDAO(); 
    $posts = $dao->retrieveAll();
    $processed_data = [];
    foreach ($posts as $post) {
        $postid = $post->getpostID();
        $posttitle = $post->getpostTitle();
        $postcontent = $post->getpostContent();
        $userid = $post->getuserID();
        array_push($processed_data, ["postid" => $postid, "posttitle" => $posttitle, "postcontent" => $postcontent, "userid" => $userid]);
    }
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>
