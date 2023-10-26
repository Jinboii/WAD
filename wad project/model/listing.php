<?php

class Listing {
    private $listing_id;
    private $title;
    private $description;     
    private $category;
    private $imgsrc;
    private $userid;
    private $offer = false;
    private $accept = false;

    public function __construct($listing_id, $title, $description, $category, $imgsrc, $userid) {
        $this->id = $listing_id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->imgsrc = $imgsrc;
        $this->userid = $userid;
    }
    public function getlistingID(){
        return $this->id;
    }

    
    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getImg() {
        return $this->imgsrc;
    }

    public function getuserID() {
        return $this->userid;
    }

    public function getOffer() {
        return $this->offer;
    }

    public function getAccept() {
        return $this->accept;
    }

    
}

?>