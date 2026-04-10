<?php

 $host="localhost";
 $user="root";
 $pass="";
 $dbname="attnd";

 $conn=mysqli_connect($host,$user,$pass,$dbname);
 if($conn){
    echo"connection build";
 }else{
    echo"connection not build";
 }
?>