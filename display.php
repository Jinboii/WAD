<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    require_once "autoload.php";
    
    $userid = "";
    $usertype = "";
    # Retrieve userid & usertype from the html/userlog
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }
    if (isset($_SESSION["usertype"])) {
        $usertype = $_SESSION["usertype"];
    }
    
    # Create a new listingDAO object
    $dao = new ListingDAO(); 

    # Call retrieveAll method of listingDAO as an argument
    $listings = $dao -> retrieveAll();


    # initialize result array
    $processed_data = [];

    if ($usertype == "organization") {

        foreach ($listings as $listing) {
            $listing_id = $listing->getlistingID();
            $title = $listing->getTitle();
            $description = $listing->getDescription();
            $category = $listing->getCategory();
            $image = $listing->getImage();
            $organization = $listing->getOrganization();
            $donater = $listing->getDonater();
    
            if ($userid == $organization) {
                array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
                "category"=> $category, "image"=> $image, "organization"=> $organization, "donater" => $donater]);
            }
        }

    }
    else {
        foreach ($listings as $listing) {
            $listing_id = $listing->getlistingID();
            $title = $listing->getTitle();
            $description = $listing->getDescription();
            $category = $listing->getCategory();
            $image = $listing->getImage();
            $organization = $listing->getOrganization();
            $donater = $listing->getDonater();
            
            if ($_REQUEST["choosencategory"]!="") {
                if($_REQUEST["choosencategory"] == $category) {
                    array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
                    "category"=> $category, "image"=> $image, "organization"=> $organization, "donater" => $donater]);
                }
            }

            else {
            
                array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
                "category"=> $category, "image"=> $image, "organization"=> $organization, "donater" => $donater]);
            }
        }
            
    }    
    
    #passing the data back to listing.html in javascript
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>