<?php
    require_once "pdo.php";

    // $sql = "CREATE DATABASE IF NOT EXISTS Nuance9";
    // $pdo -> exec($sql);
    // echo "Nuance9 database created";

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


    $sql = "CREATE TABLE IF NOT EXISTS creditcards(
        cid INT(5) NOT NULL,
        ccnum VARCHAR(16) NOT NULL PRIMARY KEY,
        cvv VARCHAR(4) NOT NULL,
        expiration VARCHAR(5) NOT NULL,
        FOREIGN KEY (cid) REFERENCES customers(cid)
    )";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS orders(
        orderid INT(5) AUTO_INCREMENT PRIMARY KEY,
        cid INT(5) NOT NULL,
        ccnum VARCHAR(16) NOT NULL,
        pid VARCHAR(14) NOT NULL,
        quantity INT(2) NOT NULL,
        order_date DATETIME NOT NULL,
        FOREIGN KEY (cid) REFERENCES customers(cid),
        FOREIGN KEY (ccnum) REFERENCES creditcards(ccnum)
    )";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS products
        pid INT(5) AUTO_INCREMENT PRIMARY KEY,
        pname VARCHAR(50) NOT NULL,
        pprice VARCHAR(10) NOT NULL,
        descripton VARCHAR(50) NOT NULL,
        pimage VARCHAR(50) NOT NULL
    )";
    $pdo->exec($sql);
?>