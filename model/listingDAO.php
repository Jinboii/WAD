<?php
#Listing DAO
class ListingDAO {

    # Retrieve all listings from listings table in DB
    public function retrieveAll() {
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();
        
        $sql = 'SELECT * FROM listings';
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
 
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Listing($row['listing_id'], $row['title']
                                , $row['description'], $row['category']
                                , $row['image'], $row['organization']
                                , $row['donater']);
                                    }

        $stmt = null;
        $conn = null;

        return $result;
    }
    
    # Add a new listing to the listings table of the DB
    public function add($listing) {
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
         
        $sql = 'insert into listings (listing_id, title, description, category, image, organization, donater) 
                        values (:listing_id, :title, :description, :category, :image, :organization, :donater)';
        $stmt = $conn->prepare($sql); 
        
        $listing_id = $listing->getlistingID();
        $title = $listing->getTitle();
        $description = $listing->getDescription();
        $category = $listing->getCategory();
        $image = $listing->getImage();
        $organization = $listing->getOrganization();
        $donater = $listing->getDonater();

        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':organization', $organization, PDO::PARAM_STR);
        $stmt->bindParam(':donater', $donater, PDO::PARAM_STR);
        
        $isAddOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isAddOK;
    }

    #select a specific listing
    public function SelectListing($listing_id){
        
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM listings WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->execute();
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            $result[] = new Listing($row['listing_id'], $row['title']
                                , $row['description'], $row['category']
                                , $row['image'], $row['organization']
                                , $row['donater']);
        }
        
        $stmt = null;
        $pdo = null;
        return $result;
    }

    #update a specific listing
    public function UpdateListing($listing_id, $title, $description, $category, $image){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE listings SET title = :title, description = :description, category = :category 
                ,image = :image WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);

        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }

    #delete a specific listing
    public function DeleteListing($listing_id){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM listings WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":listing_id",$listing_id,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }

    #update the user offer of a specific listing
    public function Updateoffer($listing_id,$donater){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE listings SET donater = :donater WHERE listing_id = :listing_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':donater', $donater, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt = null;
        $pdo = null;
        return $isOk;
    }
}
?>