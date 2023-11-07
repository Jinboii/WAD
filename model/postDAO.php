<?php

class PostDAO {
    //retrieve all post
    public function retrieveAll() {
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();
        
        $sql = 'SELECT * FROM post';
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
 
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $stmt->fetch()) {
            $result[] = new Post($row['userid'], $row['postid'], $row['posttitle'], $row['postcontent']);
        }

        $stmt = null;
        $conn = null;

        return $result;
    }
    //add a post
    public function add($post) {
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
         
        $sql = 'INSERT INTO post (userid, postid, posttitle, postcontent) VALUES (:userid, :postid, :posttitle, :postcontent)';
        $stmt = $conn->prepare($sql); 
        
        $userid = $post->getuserID();
        $postid = $post->getpostID();
        $posttitle = $post->getpostTitle();
        $postcontent = $post->getpostContent();

        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':postid', $postid, PDO::PARAM_STR);
        $stmt->bindParam(':posttitle', $posttitle, PDO::PARAM_STR);
        $stmt->bindParam(':postcontent', $postcontent, PDO::PARAM_STR);
      
        $isAddOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isAddOK;
    }

    //select a specific post
    public function SelectPost($postid){
        
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "SELECT * FROM post WHERE postid = :postid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':postid', $postid, PDO::PARAM_STR);
        $stmt->execute();
        $result = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            $result[] = new Post($row['userid'], $row['postid']
                                , $row['posttitle'], $row['postcontent']);
        }
        
        $stmt = null;
        $pdo = null;
        return $result;
    }

    //edit a post
    public function EditPost($postid, $posttitle, $postcontent) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $sql = "UPDATE post SET posttitle = :posttitle, postcontent = :postcontent WHERE postid = :postid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':postid', $postid, PDO::PARAM_STR);
        $stmt->bindParam(':posttitle', $posttitle, PDO::PARAM_STR);
        $stmt->bindParam(':postcontent', $postcontent, PDO::PARAM_STR);
        
        $isEditOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isEditOK;
    }
    //delete a post
    public function DeletePost($postid) {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $sql = "DELETE FROM post WHERE postid = :postid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":postid", $postid, PDO::PARAM_STR);
        
        $isDeleteOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isDeleteOK;
    }
}
?>
