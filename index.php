<?php
// echo'Hallo word',24,53,23;
// echo ("Hallo world faran");
// print('Hallo ggg','uuuuu');

// ============data types =====================
//  1.string
//  2.int
//  3.float
//  4.boolean
//  5.Array
//  7.abject
//  8.null
// =================variable Creation================
 

   $txt='Hello Eveyone !';
   $txt2='Welcome php tutorial.';
  
//    . sign is used to concatination

echo $txt .$txt2;

$number=5;
echo $number;

//    echo $txt;
//    echo $txt2;
// =======variable scope=======
//  php has three different variable scopes
// 1.global (access anywhere)
$x = 5; // global scope

// function myTest() {
//   // using x inside this function will not work
//   echo "Variable x inside function is: $x";
// }
// myTest();

// echo "Variable x outside function is: $x";
// // 2.local   (these variable accessed created in the function and only accessed in the function)
// // 3.static


$bool=true;
echo"<br>";
var_dump($bool);


$car=array("vlovo","BMW",23);
var_dump($car);


?>