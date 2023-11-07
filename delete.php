<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--Meta “viewport” is used to make the web page responsive to the browser/device width-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- BootStrap and Javascript-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <title>Listings</title>
       </head>

    <body>
        

<!-- Navbar start -->
<div class="container-fluid nav-bar">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg py-4">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary fw-bold mb-0">Re<span class="text-dark">Birth</span> </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Listings</a>
                        <div class="dropdown-menu bg-light">
                            <a href="food.html" class="dropdown-item">Food</a>
                            <a href="education.html" class="dropdown-item">Educational Materials</a>
                            <a href="clothing.html" class="dropdown-item">Clothing</a>
                            <a href="electronics.html" class="dropdown-item">Electronics</a>
                        </div>
                    </div>
                    <a href="service.html" class="nav-item nav-link">Community</a>
                
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Login</a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
<?php
    header("Access-Control-Allow-Origin: *");
    require_once 'autoload.php';
        
    $listing_id = $_GET["listing_id"];
        
    $dao = new listingDAO(); 
    $status = false;
        
    if ( isset($listing_id)){

        $status = $dao->DeleteListing($listing_id);
            
        if ( $status ) {
            
            echo ' <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="p-5 bg-light rounded contact-form">
                        <div class="row g-4">
                            <div class="col-12 mx-auto text-center">
                                <h1 class="display-5 mb-0">Delete was successful!</h1>
                            </div>
                            
                            <div class="text-center">
                                        <a href="listing.html"><button type="submit" class="w-50 btn btn-primary border-primary bg-primary rounded-pill">Return to listing page</button><a href="listing.html">
                                    
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>';
                
            }
        else {
            
                echo ' <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="p-5 bg-light rounded contact-form">
                        <div class="row g-4">
                            <div class="col-12 mx-auto text-center">
                                <h1 class="display-5 mb-0">Delete was unsuccessful!</h1>
                            </div>
                            
                            <div class="text-center">
                                        <a href="listing.html"><button type="submit" class="w-50 btn btn-primary border-primary bg-primary rounded-pill">Return to listing page</button><a href="listing.html">
                                    
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>';
            }
    }
?>
