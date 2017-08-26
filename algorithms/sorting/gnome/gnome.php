<?php

     function sort_with_gnome($vec) {


        $pos = 0;

        $n = count($vec);

        while($pos < $n) {

              if($pos == 0 || $vec[$pos] > $vec[$pos-1]) $pos++;

                   else {

                        $tmp = $vec[$pos];

                        $vec[$pos] = $vec[$pos-1];

                        $vec[$pos-1] = $tmp;

                        $pos--;  
                   }
        } 


        return $vec;
     }

     $arr = Array(9,8,7,6,5,4,3,2,1,0); 

     echo"<h1>Input</h1>";
     echo"<pre>";
     print_r($arr); 
     echo"</pre>";

     $arr = sort_with_gnome( $arr );

     echo"<h1>Output</h1>";
     echo"<pre>";
     print_r($arr); 
     echo"</pre>";

?>
