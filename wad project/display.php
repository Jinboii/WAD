<?php
    require_once "autoload.php";
    //session_start()   
    

    # Retrieve userid from $_SESSION[]
    $userid = 1234;   //****TO CHANGE**** -- pull user id from session: $userid = $_SESSION["userid"]

    # Create a new listingDAO object
    $dao = new ListingDAO(); 

    # Call retrieveAll method of listingDAO as an argument
    $listings = $dao -> retrieveAll();

    $processed_data = [];
    foreach ($listings as $listing) {
        $listing_id = $listing->getlistingID();
        $title = $listing->getTitle();
        $description = $listing->getDescription();
        $category = $listing->getCategory();
        $img = $listing->getImg();
        $userid = $listing->getuserID();
        $offer = $listing->getOffer();
        $accept = $listing->getAccept();

        array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
        "category"=> $category, "img"=> $img, "userid"=> $userid, "offer" => $offer,
        "accept" => $accept]);
        
    }
    
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>