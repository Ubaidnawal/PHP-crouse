<?php

//  for loop

$seats = 5;
for($i =1;$i <= 7; $i++){
if($seats > 0) {
echo "seat booking Done <br/>";
$seats--;

}
else {
    echo " House Full <br/>";
}
}

//   switech case 
$num1 = 10; 
$num2 = 5; 

$opertion = "multiply";

switch($opertion ){
    case "add":
        echo $num1 + $num2;
        break;
    case "subtract":
        echo $num1 - $num2;
        break;
    case "multiply":
        echo $num1 * $num2;
        break;
    case "divide":
        echo $num2 != 0? $num1 /$num2 : "cannot divide by zero";
        break;
    default:
        echo "Invalid operation";
}

for ( $x = 0; $x <= 10; $x++) {
if($x ==4  ) {
    break;
}
echo "the number is :$x <br/>";
}

for ($x = 0; $x <= 10; $x++){
if($x == 4 ){
continue;
}
echo "the number is :$x <br/>";
}


?>