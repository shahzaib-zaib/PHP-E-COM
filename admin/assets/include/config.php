<?php

    $hostname = "http://localhost:8080/PHP-E-COM";

    //define('DB_SERVER','localhost');
    //define('DB_USER','root');
    //define('DB_PASS' ,'');
    //define('DB_NAME', 'beweardb');
    $con = mysqli_connect("localhost", "root", "", "beweardb");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>