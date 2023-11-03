<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
        
    $listing_id = $_GET["listing_id"];
        
    $dao = new listingDAO(); 
    $status = false;
        
    if ( isset($listing_id)){

        $status = $dao->DeleteListing($listing_id);
            
        if ( $status ) {
            echo "<h3>Delete was successful!</h3><br> 
                <a href='listing.html'><button>Click here to return to listing page</button></a>";
            }
        else {
                echo "<h3>Delete was NOT successful!</h3>";
            }
    }
?>
