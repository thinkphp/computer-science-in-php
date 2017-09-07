<?php

     function bsearch_iterative($arr, $key) {

              if(!is_array($arr) || !count($arr) || !is_numeric($key)) return -1;

              $lo = 0;

              $hi = count($arr) - 1;

              while( $lo <= $hi ) {

                     $mi = ($lo + $hi) >> 1;

                     if($key == $arr[ $mi ]) return $mi;

                     else {

                          if($key < $arr[ $mi ]) $hi = $mi - 1;

                                        else 

                                                 $lo = $mi + 1; 
                     }
              } 

         return -1;
     } 

     echo"<h1>Binary Search - iterative</h1>"; 

     $arr = array(1,2,3,4,5,6,7,8,9);    

     echo"<pre>";      
     print_r($arr);
     echo"<pre/>";      


     foreach($arr as $key=>$value) {

             echo"Your number ", $value ," was found at position: ";

             echo bsearch_iterative($arr, $value);

             echo"; Should be: ", $key;

             echo"<br/>"; 
     }
 ?>