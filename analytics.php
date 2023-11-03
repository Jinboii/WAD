<?php
    header("Access-Control-Allow-Origin: *");
    require_once "autoload.php";
    //session_start()   
    
    # Retrieve userid & usertype from the html/userlog
    if (isset($_REQUEST["userid"]) && $usertype = $_REQUEST["usertype"] ){
        $userid = $_REQUEST["userid"];
        $usertype = $_REQUEST["usertype"];
    }
    
    # Create a new archiveDAO object
    $dao = new archiveDAO();
    $archives = $dao -> retrieveAll(); 
    $processed_data = [];

    $count = 0;
        
    foreach ($archives as $archive) {
        
        $listing_id = $archive->getlistingID();
        $title = $archive->getTitle();
        $description = $archive->getDescription();
        $category = $archive->getCategory();
        $image = $archive->getImage();
        $organization = $archive->getOrganization();
        $donater = $archive->getDonater();

        if ($usertype == "user" && $donater == $_REQUEST["userid"]){
            $count += 1;
            array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
            "category"=> $category, "image"=> $image, "organization"=> $organization, "donater" => $donater, "count"=> $count]);
            }
        }     
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;         
?>