<?php

     function bsearch_recursive($arr, $key, $lo, $hi) {

              if($lo > $hi) return -1;

              $middle = ($lo + $hi)>>1;  

              if($arr[$middle] == $key) return $middle;

              else if($key < $arr[$middle]) return bsearch_recursive($arr, $key, $lo, $middle - 1);

                   else return bsearch_recursive($arr, $key, $middle + 1, $hi);     
     } 

     echo"<h1>Binary Search - recursive</h1>";      

     $arr = array(1,2,3,4,5,6,7,8,9);    

     echo"<pre>";      
     print_r($arr);
     echo"<pre/>";      

     foreach($arr as $key=>$value) {

             echo"Your number ", $value ," was found at position: ";

             echo bsearch_recursive($arr, $value, 0, count($arr) - 1);

             echo"; Should be: ", $key;

             echo"<br/>"; 
     }
 ?>