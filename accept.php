<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
    
    $listing_id = $_GET["listing_id"];

    #add listing into archive table
    $dao = new listingDAO(); 
        
    $listings = $dao -> SelectListing($listing_id);

    $processed_data = [];
        
    foreach ($listings as $listing) {
        $listing_id = $listing->getlistingID();
        $title = $listing->getTitle();
        $description = $listing->getDescription();
        $category = $listing->getCategory();
        $image = $listing->getImage();
        $organization = $listing->getOrganization();
        $donater = $listing->getDonater();
        
        $archive = new archive($listing_id, $title, $description, $category, $image, $organization, $donater);

        $dao2 = new archiveDAO(); 

        $insertok = $dao2 -> add($archive);

        #delete listing from listings table
        $status = $dao->DeleteListing($listing_id);

        #message status on the archiving of completed listing
        if ($insertok && $status){
            echo "Accepted Offer!<br> 
            <a href='listing.html'><button>Back to listing page</button></a>";
        }else{
            echo "An error occured. Please contact admin for assistance";
        }
    }


?>