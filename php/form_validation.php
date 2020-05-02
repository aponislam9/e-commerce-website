<?php
    require_once "pdo.php";
    $fnameError = $lnameError = $emailError = $pidError = $quantityError = $phoneError = $addressError = $stateError = $ccnumError = $cvvError = $expirationError = "";
    $fname = $lname= $email = $pid = $quantity= $phone = $address1 = $address2 = $state = $zip = $city = $shipping = $ccnum = $cvv = $expiration = "";

    if(isset($_POST["submit"])){
        if(validate_data()){
            //add customer data
            $sql = "insert into customers (fname, lname, email, phone, street_address, city, us_state, zip)
            values (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->$execute([$fname, $lname, $email, $phone, $address1, $city, $state, $zip]);


            //add credit card
            $cid = $pdo->lastInsertId();
            $sql = "insert into creditcards () values (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$cid, $ccnum, $ccv, $expiration]);

            //add order
            $sql = "insert into customers (cid, ccnum, pid, quantity, order_date)
                values ([$cid, $ccnum, $pid, $quantity, NOW()])";

            
        }
    

    }

    //validate the data 
    function validate_data(){
        $bad_data = False;

        $GLOBALS['pid']= format_data($_POST["pid"]);


         //check first name data
        $GLOBALS['fname'] = format_data($_POST["firstName"]);
        if (empty($fname) or !preg_match("/^[A-Za-z]+$/", $GLOBALS['fname'])) {
            $GLOBALS['fnameError'] = "Bad data for first name";
            $bad_data = True;
        }

        //check last name data
         $GLOBALS['lname'] = format_data($_POST["lastName"]);
        if (empty($lname) or !preg_match("/^[A-Za-z]+$/", $GLOBALS['lname'])) {
            $GLOBALS['lnameError']= "Bad data for last name";
            $bad_data = True;
        }

        $GLOBALS['email'] = format_data($_POST["email"]);
        if (empty($email) or !preg_match("/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $GLOBALS['email'])) {
            $GLOBALS['emailError'] = "Bad data for email";
            $bad_data = True;
        }

        $GLOBALS['phone'] = format_data($_POST["phone"]);
        if (empty($phone) or !preg_match("/^(\+1\s)?\d{3}-\d{3}-\d{4}$/", $GLOBALS['phone'])) {
            $GLOBALS['phoneError'] = "Bad data for phone";
            $bad_data = True;
        }

        $GLOBALS['address1'] = format_data($_POST["address1"]);
        if (empty($address1) or !preg_match("/^\s*\S+(?:\s+\S+){2}$/", $GLOBALS['address1'])) {
            $GLBOALS['addressError'] = "Bad data for phone";
            $bad_data = True;
        }


        $GLOBALS['city'] = format_data($_POST["city"]);
        $GLOBALS['state'] = format_data($_POST["state"]);
        $GLOBALS['zip'] = format_data($_POST["zip"]);
        

        $GLOBALS['ccnum'] = format_data($_POST["ccnum"]);
        if (!is_numeric($GLOBALS['ccnum']) or strlen($GLOBALS['ccnum']) != 16) {
            $GLBOALS['ccnumError'] = "Bad data for credit card number";
            $bad_data = True;
        }

        $GLOBALS['cvv'] = format_data($_POST["cvv"]);
        if (!is_numeric($GLOBALS['ccv']) or strlen($GLOBALS['cvv']) != 3) {
            $GLBOALS['cvvError'] = "Bad data for cvv";
            $bad_data = True;
        }

        $GLOBALS['expiration'] = format_data($_POST["expiration"]);
        if (empty($address1) or !preg_match("/^(0[1-9]|10|11|12)/[0-9]{2}$/", $GLOBALS['expiration'])) {
            $GLBOALS['expirationError'] = "Bad data for expiration date";
            $bad_data = True;
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