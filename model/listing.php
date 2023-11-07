<?php
#Listing Class
class Listing {
    private $listing_id;
    private $title;
    private $description;     
    private $category;
    private $image;
    private $organization;
    private $donater;

    public function __construct($listing_id, $title, $description, $category, $image, $organization, $donater) {
        $this->listing_id = $listing_id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->image = $image;
        $this->organization = $organization;
        $this->donater = $donater;
    }

    public function getlistingID(){
        return $this->listing_id;
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

    public function getImage() {
        return $this->image;
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function getDonater() {
        return $this->donater;
    }
    }
?>