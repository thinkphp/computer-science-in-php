<?php
/*
Author:
Adrian Statescu <mergesortv@gmail.com>
 
Description:
Counting Sort Algorithm.
 
Analysis Complexity:
Worst Case Time: O(n)
Average Case Time: O(n)
Best Case Time: O(n)
Space: O(n)
 
*/
$arr = array(4,8,7,6,5,5,9,8,1);
 
echo"Input:";
echo"<pre>";
print_r($arr);
echo"</pre>";
 
$n = count($arr);
echo$n;
 
$B = array();
 
for($i = 0; $i < $n; $i++) {
  $B[$i] = 0;
}
 
$C = array();
$C = $arr;
 
for($i = 0; $i < $n-1; $i++) {
    for($j = $i + 1; $j < $n; $j++) {
        if($arr[$j] < $arr[$i]) {
           $B[$i]+=1;
        } else {
          $B[$j]+=1;
        }
    }
}
 
for($i = 0; $i < $n; $i++) {
   $arr[$B[$i]] = $C[$i];
}
echo"Output:";
echo"<pre>";
print_r($arr);
echo"</pre>";
 
