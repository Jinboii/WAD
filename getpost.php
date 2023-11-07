<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
        
    $postid = $_REQUEST["postid"];
        
    $dao = new PostDAO(); 
        
    $posts = $dao -> SelectPost($postid);
    
    $processed_data = [];
    
    foreach ($posts as $post) {
        $userid = $post->getuserID();
        $post_id = $post->getpostID();
        $postcontent = $post->getpostContent();
        $post_title = $post->getpostTitle();

        array_push($processed_data,[ "userid" => $userid, "postid" => $post_id, "postcontent" =>$postcontent, 
           "posttitle"=> $post_title]);    
        }
        
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>
