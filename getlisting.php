<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
        
    $listing_id = $_REQUEST["listingid"];
        
    $dao = new listingDAO(); 
        
    $listings = $dao -> SelectListing($listing_id);
    
    $processed_data = [];
    
    foreach ($listings as $listing) {
        $title = $listing->getTitle();
        $description = $listing->getDescription();
        $category = $listing->getCategory();
        $image = $listing->getImage();
        $organization = $listing->getOrganization();
        $donater = $listing->getDonater();

        array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
           "category"=> $category, "image"=> $image, 
           "organization"=> $organization, "donater" => $donater]);    
        }
        
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>

   
