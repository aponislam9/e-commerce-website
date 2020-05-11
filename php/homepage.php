<?php
<<<<<<< Updated upstream
=======

    // Potentially use if html on index
>>>>>>> Stashed changes
    // require_once "hpdo.php";

    $products = array();

    $servername = "localhost";
    $username = "test";
    $password = "test1234";
    
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
            echo "  <div class='card h-100' href='product-page.php' onclick='getProduct(this)'>";
            echo "      <a href='product-page.php' class='image-container'>";
            echo "          <img class='card-img-top' src='".$row["srcOne"]."' alt=''>";
            echo "      </a>";
            echo "      <div class='card-body'>";
            echo "    era      <h4 class='card-title' href='product-page.php' onclick='passValue({$row['pname']})'>";
            echo "              <a href='product-page.php' id='title' class='product-title'>{$row['pname']}</a>";
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

?>

    

