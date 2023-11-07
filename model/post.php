<?php
//post class
class Post{
    private $userid;
    private $postid;
    private $postcontent;
    private $post_title; 
    public function __construct($userid, $postid, $post_title, $postcontent) {
        $this->userid = $userid;
        $this->postid = $postid;
        $this->postcontent = $postcontent;
        $this->post_title = $post_title; 
    }
    public function getuserID() {
        return $this->userid;
    }
    public function getpostID() {
        return $this->postid;
    }
    public function getpostContent() {
        return $this->postcontent;
    }
    public function getpostTitle() {  
        return $this->post_title;
    }
}
?>