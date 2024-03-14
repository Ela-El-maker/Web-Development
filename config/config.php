<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:http://localhost/testcommerce/index.php');
    exit;
}


try {
    // Host
    define('HOST', 'localhost');
    // dbname
    define('DB_NAME', 'testcommerce');
    // username
    define('DB_USER', 'root');
    // password
    define('DB_PASS', '');
    // port
    define('DB_PORT', '3306');


    // Establishing a PDO connection
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT, DB_USER, DB_PASS);
    // Setting PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // If connected successfully


    // if ($conn == true){
    //     echo "Connected successfully";
    // }else{
    //     echo "Connection failed";
    // }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // If connection fails
}
