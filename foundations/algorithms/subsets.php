<?php

echo"<h1>Finding all the subsets of a set</h1>";

     function subsets($n) {

          $v = array();

          for($i=0;$i<$n;$i++) {
              $v[$i] = 0;
          } 

          $out = '';    

          do {

             $v[$n-1]++;

             for($i=$n-1;$i>=1;$i--) {
                 if($v[$i] > 1) {
                    $v[$i] -= 2;
                    $v[$i-1] += 1;
                 } 
             }

             $out .= "{";

             for($j=0;$j<$n;$j++) {

                 if($v[$j]) {
                    $out .= ($j+1) . ',';
                 }  
             } 

             $out .= "}";  

             $out .= "<br/>";              

             $s = 0;

             for($k=0;$k<$n;$k++) {
                 $s += $v[$k];
             }

         } while($s<$n);

       return $out . "{void}";
     }

     echo subsets(3);
?>