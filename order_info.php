<?php
    
    require_once 'php/pdo.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/order_info.css">
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

    <div class="container">
        <div class="about">
            <h1 class = "heading-title">
                Order Details
            </h1>
            <?php
                $otable = "orders";
                $ctable = "customers";
                $credtable = "creditcards";
                $ptable = "products";

                $some = $pdo->query("SELECT MAX(orderid) AS LastOrder FROM $otable");
                $last = $some->fetch(PDO::FETCH_ASSOC);
                $lastorder = $last['LastOrder'];

                $stmt = $pdo->query("SELECT * FROM $otable WHERE orderid = $lastorder");
                $order = $stmt->fetch(PDO::FETCH_ASSOC);

                echo "<p class = 'secondelem'> Order ID: ";
                echo $order['orderid'];
                echo "</p>";
                echo "<p class = 'secondelem'> Order Date: ";
                echo $order['order_date'];
                echo "</p>";

                $productid= $order['pid'];
                $prod = $pdo->query("SELECT * FROM $ptable WHERE pid = '$productid'");
                $product = $prod->fetch(PDO::FETCH_ASSOC);

                echo "<h5> Product information </h5>";
                echo "<p class = 'secondelem'> Product Name: ";
                echo $product['pname'];
                echo "</p>";
                echo "<p class = 'secondelem'> Product ID: ";
                echo $order['pid'];
                echo "</p>";
                echo "<p class = 'secondelem'> Product Quantity: ";
                echo $order['quantity'];
                echo "</p>";

                $customerid = $order['cid'];
                $ment = $pdo->query("SELECT * FROM $ctable WHERE cid = $customerid");
                $customer = $ment->fetch(PDO::FETCH_ASSOC);
                echo "<h5> Customer Information </h5>";
                echo "<p class = 'secondelem'>Name: ";
                echo $customer['fname'] . " " . $customer['lname'];
                echo "</p>";
                echo "<p class = 'secondelem'> Email: ";
                echo $customer['email'];
                echo "</p>";
                echo "<p class = 'secondelem'> Phone: ";
                echo $customer['phone'];
                echo "</p>";
                echo "<p class = 'secondelem'> Address: </br>";
                echo $customer['street_address'];
                echo "</br>";
                echo $customer['city'] . ", " . $customer['us_state'] . " " . $customer['zip'];
                echo "</p>";

                $creditid = $order['ccnum'];
                $card = $pdo->query("SELECT * FROM $credtable WHERE ccnum = $creditid");
                $ccard = $card->fetch(PDO::FETCH_ASSOC);
                echo "<h5> Payment Info </h5>";
                echo "<p class = 'secondelem'>Credit card number: ";
                echo $ccard['ccnum'];
                echo "</p>";
                echo "<p class = 'secondelem'> Expiration Date: ";
                echo $ccard['expiration'];
                echo "</p>";

                echo "<h3> Order Total: ";
                echo $order['total'];
                echo "</h3>";
                ?>
        </div>
    </div>
</body>
</html>
                
            
