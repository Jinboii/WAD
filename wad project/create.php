<?php
    require_once "autoload.php";
    //session_start()   
    

    # Retrieve userid from $_SESSION[]
    # Retrieve title, description, category, and imgsrc information passed from create.html
    
    $userid = 1234;   //****TO CHANGE**** -- pull user id from session: $userid = $_SESSION["userid"]
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $imgsrc = $_POST["img"];

    $listing_id = "$userid".date("mdhis");  
    
    # Create a new listing object with listing_id, title, description, category, imgsrc, userid
    $listing = new Listing($listing_id, $title, $description, $category, $imgsrc, $userid);

    # Create a new listingDAO object
    $dao = new ListingDAO(); 

    # Call add method of listingDAO with the new listing object as an argument
    $insertok = $dao -> add($listing);

    # Display "Listing Added" or "Listing is not added" 
    # Depending on the return value of the add method
    if ($insertok){
        echo "Listing Added <br> <a href='org_listing.html'><button>Click here to return to listing page</button></a>";
    }else{
        echo "Listing is not added";
    }
?>