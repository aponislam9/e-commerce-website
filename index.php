<?php
    
    require 'php/product-database.php'

    

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home_page_stye.css">
    <!-- <script src="js/home-page.js"></script> -->
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>

        // Get the product name from image click of product and routes to next page adding product into URL
        function getProduct(p) {
            
            var tempNode = $("div");
            // tempNode.appendChild(p);
            var str = p.innerHTML;

            var html = $.parseHTML(str)

            var secondHTML = html[3].innerHTML;

            var parsedHTML = $.parseHTML(secondHTML);

            var thirdHTML = parsedHTML[1].innerHTML;

            var lastHTML = $.parseHTML(thirdHTML);

            var finalProduct = (lastHTML[1].innerHTML);

            
            var url = "product-page.php" + '?pr=' + finalProduct;

            window.location.replace(url);
            

            passValue(finalProduct);
            
        }

        //Bascically the top function but for product name click
        function passValue(product){

            var url = "product-page.php" + '?pr=' + finalProduct;

            
            // console.log(product)
            localStorage.setItem("textvalue",product);
                


            return false;
 
}

    </script>

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/Nuance9-Logo.png" alt="Nuance 9 Logo">
            </a>
            <div class="nav-bar-links-container">
                <div class="topnav" id="nav-bar-tabs">
                    <a href="index.php">Apparel</a>
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

                <!-- <div class="col-lg-6 col-md-6 ol-sm-6 col-6"> -->


            <?php 

                // include "php/homepage.php";

                
                $products = array();

                $servername = "localhost";
                $username = "user";
                $password = "test123";
                
                try{
                    
                    $pdo = new PDO('mysql:host = $servername;dbname=Products', $username, $password);
                    $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
                    // echo "connection succesful";

                    $sql = "SELECT * FROM `prodTest`";
                    // $data = $pdo->query($sql);

                    $data = $pdo->prepare($sql);
                    $data->execute();


                    

                    
                    
                    // foreach ($data as $row) {

                    while($row = $data->fetch(PDO::FETCH_ASSOC)){
                        // $append_array = array("id"=>$row["id"],
                        // "name"=>$row["name"],
                        // "price"=>$row["price"]
                        // $name = $row["name"];
                        
                    
                    // );
                    
                    // adds to the products array
                    // array_push($products,$append_array);

                        // echo "<div class = col-lg-6 col-md-6 col-sm-6 col-6 product-card>";
                        // echo "<a class = card h-100 href=product-page.html>";
                        // echo "<img src=".$row["srcOne"].">";
                        // echo "</a>";
                        // echo "</div>";


                        echo "<div class='col-lg-6 col-md-6 mb-6 product-card'>";

                        // card_title_a.onclick=function(e){
                        //     // console.log(e.toElement.text)
                        //     var product = e.toElement.text;
                        //     passValue(product)
                        $title = $row['pname'];
                        echo "  <div class='card h-100' onclick='getProduct(this)'>";
                        echo "      <a href='#' class='image-container'>";
                        echo "          <img class='card-img-top' src='".$row["srcOne"]."' alt=''>";
                        echo "      </a>";
                        echo "      <div class='card-body'>";
                        // echo "         <h4 class='card-title' onclick='passValue({$row['pname']})'>";
                        echo "         <h4 class='card-title' onclick='passValue({$row['pname']})'>";
                        echo "              <a href='#' id='title' class='product-title'>{$row['pname']}</a>";
                        echo "          </h4>";
                        echo "          <h5 class='card-cost'>{$row['price']}</h5>";
                        echo "          <p class='card-text'>{$row['descr']}</p>";
                        echo "      </div>";
                        echo "  </div>";
                        echo "</div>"; 
                        
                        
                    
                    }

                    // print_r($products);
                    


                    
                }
                catch(PDOException $e)
                {
                    echo $e-> getMessage();
                }

            // ?>
        </div>

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
