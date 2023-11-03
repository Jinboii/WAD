<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
    
    $listing_id = $_POST["listingid"];


    if (isset($_POST["title"])) {
        $title = $_POST["title"];
    }

    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }

    if (isset($_POST["category"])) {
        $category = $_POST["category"];
    }

    if (isset($_POST["image"])) {
        $image = $_POST["image"];
    }

    

    $dao = new listingDAO(); 
    $status = false;
    
    if ( isset($listing_id)){

        $status = $dao->UpdateListing($listing_id, $title, $description, $category, $image);
        
        if ( $status ) {
            echo "<h3>Update was successful!</h3><br> <a href='listing.html'><button>Click here to return to listing page</button></a>";
        }
        else {
            echo "<h3>Update was NOT successful!</h3>";
        }
    }

?>