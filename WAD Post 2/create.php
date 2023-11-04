<?php

    require_once "autoload.php";
    $userid = 1234; 
    $postid = $userid . date("mdhis");
    $posttitle = $_POST["posttitle"];
    $postcontent = $_POST["postcontent"];
    $post = new Post($userid, $postid, $posttitle, $postcontent);
    $dao = new PostDAO(); 
    $insertok = $dao->add($post);
    if ($insertok) {
        echo "Post Added <br> <a href='posts_listing.html'><button>Click here to return to posts page</button></a>";
    } else {
        echo "Post is not added";
    }
?>

