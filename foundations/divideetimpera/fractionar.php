<?php

     $n = 12.3;
     $li = 10;
     $ls = 14;

     function divimp($n,$li,$ls) {

          if(($ls-$li)>1) {
             $m = ($li+$ls)/2;
             if($m == $n) {
                return $m;
             } else if($n > $m) {
                return divimp($n,$m,$ls); 
             } else {
                return divimp($n,$li,$m); 
             }
          } else {
            return $li; 
          }
     }
     echo"<h2>The whole and fractionar part of any number </h2>";
     echo "N = $n";  
     echo"<br/>";
     $whole = divimp($n,$li,$ls);
     echo "The whole Part [$n] = " , $whole;  
     echo"<br/>";
     echo "The Fractionar Part { $n } = " , $n - $whole;  
?>