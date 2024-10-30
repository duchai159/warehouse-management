<?php
 $host = "localhost";
 $user = "root";
 $password = "Haikun159@";
 $database = "qlkho";

 $conn = new mysqli($host, $user, $password, $database);

 if ($conn->connect_error){

    die ("khong the ket noi den MySQL: " . $conn->conect_error);
 }
 $conn->set_charset("utf8");
 ?> 