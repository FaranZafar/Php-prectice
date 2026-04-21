<?php

 $host="localhost";
 $user="root";
 $dbname="attnd";

 $pass="";

  $con=mysqli_connect($host, $user, $pass, $dbname);
  if($con){
    echo "Connection built successfully";

  }else{
    echo "Connection failed: " . mysqli_connect_error();
  }


?>