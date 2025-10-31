<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "funiproject";

    $conn=mysqli_connect($server, $username, $password, $dbname);
    if(!$conn){
        echo "Connect Error";
    }
    // else{
    //     echo "connect Succesfully";
    // }

?>