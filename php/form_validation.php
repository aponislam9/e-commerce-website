<?php
    require_once "pdo.php";
    $fnameError = $lnameError = $emailError = $pidError = $quantityError = $phoneError = $addressError = $stateError = $ccnumError = $cvvError = $expirationError = "";
    $fname = $lname= $email = $pid = $quantity= $phone = $address1 = $address2 = $state = $zip = $city = $shipping = $ccnum = $cvv = $expiration = "";


    if(isset($_POST["submit"])){
        if(!validate_data()){
            echo "no bad data";

            //add customer data
            $sql = "INSERT INTO customers (fname, lname, email, phone, street_address, city, us_state, zip)
            VALUES (:fname, :lname, :email, :phone, :street_address, :city, :us_state, :zip)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':fname'=>$fname, ':lname'=>$lname, ':email'=>$email, ':phone'=>$phone, ':street_address'=>$address1, ':city'=>$city, ':us_state'=>$state, ':zip'=>$zip));


            // //add credit card
            $cid = $pdo->lastInsertId();
            $sql = "INSERT INTO creditcards (cid, ccnum, cvv, expiration) VALUES (:cid, :ccnum, :cvv, :expiration)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':cid'=>$cid, ':ccnum'=>$ccnum, ':cvv'=>$cvv, ':expiration'=>$expiration));

            // //add order
            $sql = "INSERT INTO orders (cid, ccnum, pid, quantity, order_date)
                VALUES (:cid, :ccnum, :pid, :quantity, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':cid'=>$cid, ':ccnum'=>$ccnum, ':pid'=>$pid, ':quantity'=>$quantity));

            
        }
        else{
            echo "invalid input";
        }
    

    }

    //validate the data 
    function validate_data(){
        $bad_data = False;

        $GLOBALS['pid']= format_data($_POST["pid"]);
        $GLOBALS['quantity'] = format_data($_POST["quantity"]);

        // echo format_data($_POST["firstName"]);

        //  //check first name data
        $GLOBALS['fname'] = format_data($_POST["firstName"]);
        if (empty($GLOBALS['fname']) or !preg_match("/^[A-Za-z]+$/", $GLOBALS['fname'])) {
            $GLOBALS['fnameError'] = "Bad data for first name";
            $bad_data = True;
            echo $GLOBALS['fnameError'];
        }

        // //check last name data
        $GLOBALS['lname'] = format_data($_POST["lastName"]);
        if (empty($GLOBALS['lname']) or !preg_match("/^[A-Za-z]+$/", $GLOBALS['lname'])) {
            $GLOBALS['lnameError']= "Bad data for last name";
            $bad_data = True;
            echo $GLOBALS['lnameError'];
        }

        $GLOBALS['email'] = format_data($_POST["email"]);
        if (!filter_var($GLOBALS['email'], FILTER_SANITIZE_EMAIL)) {
            $GLOBALS['emailError'] = "Bad data for email";
            $bad_data = True;
            echo $GLOBALS['emailError'];
        }

        $GLOBALS['phone'] = format_data($_POST["phone"]);
        if (empty($GLOBALS['phone']) or !preg_match("/^(\+1\s)?\d{3}-\d{3}-\d{4}$/", $GLOBALS['phone'])) {
            $GLOBALS['phoneError'] = "Bad data for phone";
            $bad_data = True;
            echo $GLOBALS['phoneError'];
        }

        $GLOBALS['address1'] = format_data($_POST["address1"]);
        if (empty($GLOBALS['address1']) or !preg_match("/^\s*\S+(?:\s+\S+){2}$/", $GLOBALS['address1'])) {
            $GLBOALS['addressError'] = "Bad data for phone";
            $bad_data = True;
            echo $GLBOALS['addressError'];
        }


        $GLOBALS['city'] = format_data($_POST["city"]);
        $GLOBALS['state'] = format_data($_POST["state"]);
        $GLOBALS['zip'] = format_data($_POST["zip"]);
        

        $GLOBALS['ccnum'] = format_data($_POST["ccnum"]);
        if (!is_numeric($GLOBALS['ccnum']) or strlen($GLOBALS['ccnum']) != 16) {
            $GLBOALS['ccnumError'] = "Bad data for credit card number";
            $bad_data = True;
            echo $GLBOALS['ccnumError'];
        }

        $GLOBALS['cvv'] = format_data($_POST["cvv"]);
        if (!is_numeric($GLOBALS['cvv']) or strlen($GLOBALS['cvv']) != 3) {
            $GLBOALS['cvvError'] = "Bad data for cvv";
            $bad_data = True;
            echo $GLBOALS['cvvError'];
        }

        $GLOBALS['expiration'] = format_data($_POST["expiration"]);
        if (empty($GLOBALS['expiration']) or !preg_match("/^(0[1-9]|10|11|12)\/[0-9]{2}$/", $GLOBALS['expiration'])) {
            $GLBOALS['expirationError'] = "Bad data for expiration date";
            $bad_data = True;
            echo $GLBOALS['expirationError'];
        }

        return $bad_data;
    }


    //formulate the data
    function format_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>