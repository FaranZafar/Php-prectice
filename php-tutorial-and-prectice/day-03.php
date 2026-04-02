<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Data types</title>
</head>
<body>
    <h2>Php Data types</h2>
    <?php
      //variabes can store data of different types and different data types can do different things
      //supports following data types
      //1 string -> text values
      //2 int  -> whole numbers
      //3 float -> decimal numbers
      //4 bool -> true or false
      //5 array -> multiple values
      //6 object -> stores data as object
      //7 null -> empty variables
      // resource -> refrences external resources


      // var_dump() function is used to find the data type of the  variable
      
      //integer
      $a=5;
      var_dump($a );
      echo "<br>";
      // string
      $b="hallo world!";
      var_dump($b );
      echo "<br>";
      //float
      $c=99.99;
      var_dump($c );
      echo "<br>";
      //bool
      //oftenly used for conditional testing
      $d=true;
      var_dump($d );
      echo "<br>";
      //array 
      //used to store multiple values for one single variable
      $car=array("Hundai","BMW","toyota");
      var_dump($car );
      echo "<br>";

    ?>
</body>
</html>