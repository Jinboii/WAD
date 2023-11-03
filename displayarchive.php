<?php
    header("Access-Control-Allow-Origin: *");
    require_once "autoload.php";

    if (isset($_REQUEST["userid"]) && $usertype = $_REQUEST["usertype"] ){
        $userid = $_REQUEST["userid"];
        $usertype = $_REQUEST["usertype"];
    }


    $dao = new archiveDAO();
    $archives = $dao -> retrieveAll(); 
    $processed_data = [];

    if ($usertype == "organization") {

        foreach ($archives as $archive) {
            $listing_id = $archive->getlistingID();
            $title = $archive->getTitle();
            $description = $archive->getDescription();
            $category = $archive->getCategory();
            $image = $archive->getImage();
            $organization = $archive->getOrganization();
            $donater = $archive->getDonater();
    
            if ($userid == $organization) {
                array_push($processed_data,[ "listing_id" => $listing_id, "title" => $title, "description" =>$description, 
                "category"=> $category, "image"=> $image, "organization"=> $organization, "donater" => $donater]);
            }
        }
    }
    $jsonObj = json_encode($processed_data);
    echo $jsonObj;
?>