<?php
    $conn = new mysqli("localhost","root",null,"Employee");
    if($conn->connect_error){
        die("Connection to Mysql failed");
    }