<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product-page.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/product-info.js"></script>
    <script src="js/form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address1 = $('#address1').val();
                var city = $('#city').val();
                var state = $('#state').val();
                var zip = $('#zip').val();
                var ccnum = $('#ccnum').val();
                var expiration = $('#expiration').val();
                var cvv = $('#cvv').val();
                var submit = $('#submit').val();
                var pid = $('#productid').val();
                var quantity = $('#quantity').val();
                var shipping = $("input[name='shipping']:checked").val();
                $('.error-message').load("php/form_validation.php", {

                    fname: fname,
                    lname: lname,
                    email: email,
                    phone: phone,
                    address1: address1,
                    city: city,
                    state: state,
                    zip: zip,
                    ccnum: ccnum,
                    expiration: expiration,
                    cvv: cvv,
                    submit: submit,
                    pid: pid,
                    quantity: quantity,
                    shipping: shipping
                });
            });
        });
    </script>
</head>

<body>

    <script>
        var product = localStorage.getItem("textvalue")
        console.log("YEP")
        console.log(product);
    </script>
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

    <!-- Product info on the top -->



    <div class="Product">
        <div class="row">
            <div class="col-md-5">
                <?php

                require 'php/product-database.php';

                try {
                    $servername = "localhost";
                    $username = "user";
                    $password = "test123";
                    $database = "Products";

                    $connection = mysqli_connect($servername, $username, $password, $database);

                    if (!$connection) {
                        echo 'COULD NOT CONNECT';
                        die('Could not connect:' . mysql_error());
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }





                $product = $_GET['pr'];

                

                $sql = "SELECT * FROM prodTest WHERE pname =" . "'" . strval($product) . "'" . "";


                foreach ($connection->query($sql) as $row) {


                    echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>";
                    echo "<div class='carousel-inner'>";
                    echo "<div class='carousel-item active'>";

                    echo "<img class='d-block w-100' src=" . $row["srcOne"] . " alt='First slide'>";
                    echo "</div>";

                    echo "<div class='carousel-item'>";
                    echo "<img class='d-block w-100' src=" . $row["srcTwo"] . " alt='Second slide'>";
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                    echo "<img class='d-block w-100' src=" . $row["srcThree"] . " alt='Third slide'>";
                    echo "</div>";
                    echo "</div>";

                    echo "<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>";
                    echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                    echo "<span class='sr-only'>Previous</span>";
                    echo "</a>";
                    echo "<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>";
                    echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                    echo "<span class='sr-only'>Next</span>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";



                    echo "<div class='col-md-7'>";
                    echo "<h2 id='name'>" . $row["pname"] . "</h2>";
                    echo "<p id='prd-color'></p>";
                    echo "<p id='description'> " . $row["descr"] . "</p>";
                    // echo "<img src ='assets/5-stars.png' class='rating'>";
                    echo "<p id = 'pid'></p>";
                    echo "<div class='row price-row'>";
                    echo "<p class='price' id='price'>" . $row["price"] . "</p>";
                    echo "<p class='tax' id='tax'>+tax</p>";
                    echo "</div>";

                    echo "<label for='size'>Select a size</label>";

                    echo "<select id='sizes'>";
                    echo "<option value='Small'>Small</option>";
                    echo "<option value='Medium'>Medium</option>";
                    echo "<option value='large'>Large</option>";

                    echo "</select>";
                    echo "<p><b>Brand:</b>Nuance9</p>";


                    echo "<button type='button' class='btn btn-default cart'>";
                    echo "Add to cart";
                    echo "</button>";


                    echo "</div>";
                }

                // echo $row["pname"];
                // echo $row["pid"];


                ?>
                <!-- Carousel was taken from the Bootstrap website with modifcations -->
                <!-- <img id="img" class="d-block w-100" alt="Product img"> -->

                <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            
                            <img class="d-block w-100" id="first-image" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" id="second-image" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" id="third-image" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>         -->


                <!-- </div> -->

                <!-- <div class="col-md-7">
                <h2 id="name"></h2>
                <p id="prd-color"></p>
                <p id="description"></p>
                
                <p id = "pid"></p>
                <div class="row price-row">
                    <p class="price" id="price"></p>
                    <p class="tax" id="tax">+tax</p>
                </div>
                <label for="size">Select a size</label>

                <select id="sizes">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="large">Large</option>
                    
                </select>
                <p><b>Brand:</b>Nuance9</p>

                
                <button type="button" class="btn btn-default cart">
                    Add to cart
                </button>


            </div> -->

                <!-- </div> -->

                <!-- End of Product Info -->

                <!-- Actual Buying of Product -->


            </div>

            <form class="container form">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="pid">Product Identifier</label>
                        <input class="form-control" type="text" id="productid" name="pid">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="quantity">Quantity</label>
                        <input class="form-control" type="number" id="quantity" name="quantity" required min="1" max="10">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="firstName" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lastName" required>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="youremail@domain.com" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" type="tel" id="phone" name="phone" placeholder="123-456-7890 or +1 123-456-7890" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="address1">Address</label>
                        <input class="form-control" type="text" id="address1" name="address1" placeholder="Street and number, P.O. box c/o" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="address2">Address 2</label>
                        <input class="form-control" type="text" id="address2" name="address2" placeholder="Apartment, studio, or floor (optional)">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="address2">City</label>
                        <input class="form-control" type="text" id="city" name="city" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="state">State</label>
                        <!-- <select class="form-control" id="state" required name = "state" onfocus = "generateStateOptions()">
                    
                </select> -->
                        <input class="form-control" type=" text" id="state" name="state">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input class="form-control" type="text" id="zip" name="zip" required>
                    </div>
                </div>

                <label for="shipping">Shipping</label>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <input type="radio" id="standard" name="shipping" value="standard">
                        <label for="standard">Standard Shipping $4.99</label>
                    </div>

                    <div class="form-group col-md-3">
                        <input type="radio" id="two-day" name="shipping" value="two-day">
                        <label for="two-day">Two-Day Shipping $10.99</label>
                    </div>

                    <div class="form-group col-md-3">
                        <input type="radio" id="overnight" name="shipping" checked value="overnight">
                        <label for="two-day">Overnight Shipping $14.99</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="ccnum">Card Card Number</label>
                        <input class="form-control" type="text" id="ccnum" name="ccnum" pattern="[0-9]{16}" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="expiration">Expiration </label>
                        <input class="form-control" type="text" id="expiration" name="expiration" placeholder="01/10" required pattern="[0-9]{2}/[0-9]{2}">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="cvv">CVV</label>
                        <input class="form-control" type="text" id="cvv" name="cvv" placeholder="000" pattern="[0-9]{3}" required>
                    </div>
                </div>

                <button id="submit" type="submit" class="btn btn-primary" name="submit">Submit</button>
                <p class="error-message"></p>
            </form>

</body>