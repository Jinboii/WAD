<?php

class ListingDAO {

    # Retrieve all courses from the course table in the DB
    public function retrieveAll() {
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();
        
        $sql = 'SELECT * FROM listing';
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
 
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Listing($row['listing_id'], $row['title']
                                , $row['description'], $row['category']
                                , $row['imgsrc'], $row['userid']
                                , $row['offer'], $row['accept']);
                                    }

        $stmt = null;
        $conn = null;

        return $result;
    }
    
    # Add a new course to the course table of the DB
    public function add($listing) {
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
         
        $sql = 'insert into listing (listing_id, title, description, category, imgsrc, userid, offer, accept) 
                        values (:listing_id, :title, :description, :category, :imgsrc, :userid, :offer, :accept)';
        $stmt = $conn->prepare($sql); 
        
        $listing_id = $listing->getlistingID();
        $title = $listing->getTitle();
        $description = $listing->getDescription();
        $category = $listing->getCategory();
        $imgsrc = $listing->getImg();
        $userid = $listing->getuserID();
        $offer = $listing->getOffer();
        $accept = $listing->getAccept();

        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':imgsrc', $imgsrc, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':offer', $offer, PDO::PARAM_STR);
        $stmt->bindParam(':accept', $accept, PDO::PARAM_STR);
        
        $isAddOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isAddOK;
    }
    public function UpdateListing($listing_id, $title, $description, $category, $imgsrc){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE listing SET title = :title, description = :description, category = :category 
                ,imgsrc = :imgsrc, offer = :offer, accpet = :accept WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':imgsrc', $imgsrc, PDO::PARAM_STR);
        $stmt->bindParam(':offer', $offer, PDO::PARAM_STR);
        $stmt->bindParam(':accept', $accept, PDO::PARAM_STR);
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }
    public function DeleteListing($listing_id){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM listing WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":listing_id",$listing_id,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }
}





?>