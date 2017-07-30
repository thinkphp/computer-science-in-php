<?php

     function bubblesort($arr) {

         $vec = array();

         $vec = $arr;

         $finished = 0;

         $last = count( $vec );  


         while( !$finished ) {

                $swapped = 0;

                for($i = 0; $i < $last - 1; $i++) {

                    if($vec[ $i ] > $vec[ $i + 1 ]) {

                       $temp = $vec[ $i ]; 

                       $vec[ $i ] = $vec[ $i + 1];

                       $vec[ $i + 1] = $temp; 

                       $swapped  = 1;
                    }             
   
                }     

                if($swapped == 1) $last--;

                       else 
                                  $finished = 1;          
         }

       return $vec;
     }; 

     $arr = Array(9,8,7,6,5,4,3,2,1,0); 

     echo"<h1>Input</h1>";
     echo"<pre>";
     print_r($arr); 
     echo"</pre>";

     $arr = bubblesort( $arr );

     echo"<h1>Output</h1>";
     echo"<pre>";
     print_r($arr); 
     echo"</pre>";

?>