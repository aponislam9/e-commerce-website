<?php
    require_once "pdo.php";

    $sql = "CREATE DATABASE IF NOT EXISTS Nuance9";
    $pdo -> exec($sql);
    echo "Nuance9 database created";

    $sql = "CREATE TABLE IF NOT EXISTS customers(
        cid INT(5) AUTO_INCREMENT,
        fname VARCHAR(30) NOT NULL,
        lname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(10) NOT NULL,
        street_address VARCHAR(50) NOT NULL,
        city VARCHAR(30) NOT NULL,
        us_state VARCHAR(30) NOT NULL,
        zip VARCHAR(30) NOT NULL,
        PRIMARY KEY (cid)
    )";
    $pdo->exec($sql);
    echo "customers table created";



    $sql = "CREATE TABLE IF NOT EXISTS creditcards(
        cid INT(5) NOT NULL,
        ccnum INT(16) NOT NULL PRIMARY KEY,
        ccv INT(4) NOT NULL,
        expiration VARCHAR(5) NOT NULL,
        FOREIGN KEY (cid) REFERENCES customers(cid)
    )";
    $pdo->exec($sql);
    echo "creditcards table created";

    $sql = "CREATE TABLE IF NOT EXISTS orders(
        orderid INT(5) AUTO_INCREMENT PRIMARY KEY,
        cid INT(5) NOT NULL,
        ccnum INT(16) NOT NULL,
        quantity INT(2) NOT NULL,
        order_date DATETIME NOT NULL,
        FOREIGN KEY (cid) REFERENCES customers(cid),
        FOREIGN KEY (ccnum) REFERENCES creditcards(ccnum)
    )";
    $pdo->exec($sql);
    echo "orders table created";
?>