<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
    
    $listing_id = $_GET['listing_id'];
    $donater = $_GET['donater_id'];
    
    $dao = new listingDAO(); 
    $status = false;
    
    if ( isset($listing_id)){

        $status = $dao->Updateoffer($listing_id,$donater);
        
        if ( $status ) {
            echo "<h3>Offer was successful!</h3><br> 
            <a href='listing.html'><button>Return to listing page</button></a>";
        }
        else {
            echo "<h3>Offer was NOT successful! Please try again.</h3>";
        }
    }
?>