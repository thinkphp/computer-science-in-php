<?php

     /*
        Computes natural logarithm LN without LN built-in from language
        ln(3) = ?
                x
        f(x) = e  - a;
        if f(li)*f(m) < 0 then solution is in [li,m) otherwise [m,ls];
      */
      $EPS = 0.0001; 
      function logn($a,$li,$ls) {  
            global $EPS;
            if($a == 1) {
               return 0;
            }
            if(abs($li-$ls) < $EPS) {
               return (($li+$ls)/2);
            } else if((exp($li)-$a)*(exp(($li+$ls)/2)-$a) < 0) {
              return logn($a,$li,($li+$ls)/2);
            } else {
              return logn($a,($li+$ls)/2,$ls);
            }
      }

      echo logn(0.5,0,-10);
      echo"<br/>";
      echo log(0.5);
?>