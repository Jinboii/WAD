<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
    
    $postid = $_POST["postid"];


    if (isset($_POST["posttitle"])) {
        $posttitle = $_POST["posttitle"];
    }

    if (isset($_POST["postcontent"])) {
        $postcontent = $_POST["postcontent"];
    }
    
    $dao = new PostDAO(); 
    $status = false;
    
    if ( isset($postid)){

        $status = $dao->EditPost($postid, $posttitle, $postcontent);
        
        if ( $status ) {
            echo "<h3>Update was successful!</h3><br> <a href='blog.html'><button>Click here to return to listing page</button></a>";
        }
        else {
            echo "<h3>Update was NOT successful!</h3>";
        }
    }
?>