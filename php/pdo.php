<?php
    try{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $pdo = new PDO('mysql:host = $servername; dbname=nuance9db', $username, $password);
        $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e-> getMessage();
    }
?>