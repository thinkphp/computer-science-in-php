<?php

    /*
     *
     *   Approximate the function sin with series Taylor!
     *   cos(x) = 1 - x^2/2! + x^4/4! - x^6/6! + ....(-1)^n*x^(2n)/(2n)!;
     * 
     */

    function fact($n) {
         if($n==0) {return 1;}
            else 
                   {return $n*fact($n-1);}
    }

    function cosinus($num,$pre) {

         $value = 0;

         for($n=0;$n<$pre;$n++) {

             $value += pow(-1.0,$n) * pow($num,2*$n) / fact(2*$n);
         }

      return $value;
    } 

    function cosinus2($num) {

          $eps = 0.00001; 
          $n = 2;

          $v1 = 1;
          $v2 = $v1 - pow($num,2)/fact(2); 

          while(abs($v1-$v2)>=$eps) {

             $v1 = $v2;
             $v2 += pow(-1.0,$n)* pow($num,2*$n) / fact(2*$n);
             $n++;  
          }

      return $v2;
    }
    echo"<h1>cos(27)=?</h1>";
    echo"<h1>cos(x) = 1 - x^2/2! + x^4/4! - x^6/6! + ....(-1)^n*x^(2n)/(2n)!</h1>";
    echo cosinus(27,50);
    echo"<br>"; 
    echo cos(27);
    echo"<br>"; 
    echo cosinus2(27);

?>
