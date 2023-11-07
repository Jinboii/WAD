<?php
    session_start();
    require_once "autoload.php";
    $userid = $_SESSION["userid"];
    $postid = $userid . date("mdhis");
    $posttitle = $_POST["posttitle"];
    $postcontent = $_POST["postcontent"];
    $post = new Post($userid, $postid, $posttitle, $postcontent);
    $dao = new PostDAO(); 
    $insertok = $dao->add($post);
    if ($insertok) {
  
        echo "Post Added <br> 
        <a href='blog.html'><button>Click here to return to posts page</button></a>";
    } else {
        echo "Post is not added";
    }
?>

