<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day-01 php</title>
</head>
<body>
     <h1>Day 01 php</h1>
     <?php
    //   echo 'hallo world';
      
    //   //single line comment
    //   /* multiline comment*/
    //  $name='Faran Zafar';
    //  $age=19;
    //  echo " my name is $name and age is $age";
    //  var_dump($name);

    // $x = 5; // global scope

//      function myTest() {
//   // using x inside this function will not work
//       echo "Variable x inside function is: $x";
//     }
//     myTest();

//      echo "Variable x outside function is: $x";

// function myTest() {
//   $x = 5; // local scope
//   echo "Variable x inside function is: $x";
// }
// myTest();

// // using x outside the function will not work
// echo "Variable x outside function is: $x";
// function myTest() {
//   static $x = 0; // static scope
//   echo $x;
//   $x++;
// }

// myTest();
// myTest();
// myTest();
// myTest();
// myTest();

//prectice questions
// $name='Faran Zafar';
// echo"$name";
// //sum of numbers
// $a=5;
// $b=10;
// $sum=$a+$b;
// echo $sum;
// //swap values 
// $num1=12;
// $num2=21;
// $temp;
// if($num1>0){
//     $temp=$num1;
//     $num1=$num2;
//     $num2=$temp;
// }
// echo "num1: $num1";
// echo "num2 : $num2";
// //concatination
// $fname='Faran';
// $lname=' Zafar';
// echo $fname.$lname;
//variables type
// $ste='faran';
// $age=19;
// $bool=true;
// $char='a';
// $float=9.98;
// var_dump($ste);
// var_dump($age);
// var_dump($bool);
// var_dump($char);
// var_dump($float);

// //simple if
// if($age>=18){
//     echo 'Adult';
// }

//even or odd checker
$num1=13;
$num2=13;
if($num1%2==0){
    echo'even number';
}else{
    echo 'odd number';
}
$area=$num1*$num2;
echo "area is:$area ";
     ?>
</body>
</html>