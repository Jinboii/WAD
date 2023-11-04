<!DOCTYPE html>
<html lang="en">

<body>

    <?php
        require_once 'autoload.php';
        
        $postid = $_GET["postid"];
        
        $dao = new postDAO(); 
        $status = false;
        
        if (isset($postid)) {

            $status = $dao->DeletePost($postid);
            
            if ($status) {
                echo "<h3>Post deletion was successful!</h3><br> <a href='posts_listing.html'><button>Click here to return to posts page</button></a>";
            } else {
                echo "<h3>Post deletion was NOT successful!</h3>";
            }
        }
    ?>

</body>
</html>
