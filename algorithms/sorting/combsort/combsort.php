<?php

define('shrinkFactor', 1.3);

function combsort( $arr ) {

         $gap = count( $arr );
         $n = count( $arr );
         $swapped = 0;

         while($gap > 1 || $swapped) {

               if($gap > 1) $gap = floor($gap / shrinkFactor);

               for($i = 0; $i + $gap < $n; $i++) {

                   $swapped = 0;
                   if($arr[ $i ] > $arr[$i + $gap]) {
                      $tmp = $arr[ $i ];
                      $arr[ $i ] = $arr[ $i + $gap ];
                      $arr[ $i + $gap ] = $tmp;
                      $swapped = 1;    
                   }
               } 
         } 

     return $arr; 
};

echo"<h1>";
echo"Comb Sort Algorithm";
echo"</h1>";

echo"<h2>Input array </h2> ";
$arr = array();

for($i = 0; $i < 20; $i++) {

    $arr[] = $i;  
}

shuffle($arr);

echo"<pre>";
print_r($arr);
echo"</pre>";

$sortedArr = combsort($arr);

echo"<h2>Output Sorted array </h2> ";

echo"<pre>";
print_r($sortedArr);
echo"</pre>";

echo"<pre>";
var_dump($sortedArr);
echo"</pre>";

?>