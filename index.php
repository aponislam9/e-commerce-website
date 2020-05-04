<?php

$conn = mysqli_connect("localhost", "test", "test123", "nuange9");

if(!$conn){
    echo "Connection Error" . mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home_page_stye.css">
    <script src="js/home-page.js"></script>
</head>

<body>

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="assets/Nuance9-Logo.png" alt="Nuance 9 Logo">
            </a>
            <div class="nav-bar-links-container">
                <div class="topnav" id="nav-bar-tabs">
                    <a href="index.html">Apparel</a>
                    <a href="about.html">About</a>
                </div>
            </div>

        </div>
    </nav>

    <!-- Shop Content  -->
    <div class="container">

        <div class="row">
        <div class="col-lg-12 sm-p-100 products">
            <div class="row" id="products-container">

                <?php 

                echo "test"
                ?>

        <!-- [DON'T DELETE THIS, ITS A REFERNCE] ------------------
    
            <div class="col-lg-6 col-md-6 mb-6 product-card">
                <div class="card h-100">
                <a href="#" class="image-container">
                    <img class="card-img-top" src="assets/Product-1-v0.jpg" alt="">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#" class="product-title">Amalgam Fleece+Snyth</a>
                    </h4>
                    <h5 class="card-cost">$224.99</h5>
                    <p class="card-text">An amalgamation of different materials stiched together to form the pertect hoodie.</p>
                </div>
                </div>
            </div>
            
        ---- [DON'T DELETE THIS, ITS A REFERNCE] ----------------->

            </div>
        </div>
        </div>
    </div>
</body>
</html>
