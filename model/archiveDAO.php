<?php
#archiveDAO
class ArchiveDAO {

    # Retrieve all archive from the archive table in the DB
    public function retrieveAll() {
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();
        
        $sql = 'SELECT * FROM archive';
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

    
    # Add a new archive to the archive table of the DB
    public function add($archive) {
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
         
        $sql = 'insert into archive (listing_id, title, description, category, image, organization, donater) 
                        values (:listing_id, :title, :description, :category, :image, :organization, :donater)';
        $stmt = $conn->prepare($sql); 
        
        $listing_id = $archive->getlistingID();
        $title = $archive->getTitle();
        $description = $archive->getDescription();
        $category = $archive->getCategory();
        $imgsrc = $archive->getImage();
        $org = $archive->getOrganization();
        $donater = $archive->getDonater();

        $stmt->bindParam(':listing_id', $listing_id, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':image', $imgsrc, PDO::PARAM_STR);
        $stmt->bindParam(':organization', $org, PDO::PARAM_STR);
        $stmt->bindParam(':donater', $donater, PDO::PARAM_STR);
        
        $isAddOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isAddOK;
    }
}
?>