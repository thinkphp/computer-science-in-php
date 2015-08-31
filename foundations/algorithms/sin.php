<?php

    /*
     *
     *   Approximate the function sin with series Taylor!
     *   sin(x) = x - x^3/3! + x^5/5! - x^7/7! + ....(-1)^n+1*x^(2n+1)/(2n+1)!;
     * 
     */

    function fact($n) {
         if($n==0) {return 1;}
            else 
                   {return $n*fact($n-1);}
    }

    function sinus($num,$pre) {

         $value = 0;

         for($n=0;$n<$pre;$n++) {

             $value += pow(-1.0,$n) * pow($num,2*$n+1) / fact(2*$n+1);
         }

      return $value;
    } 

    function sinus2($num) {

          $eps = 0.00001; 
          $n = 2;

          $v1 = $num;
          $v2 = $num - pow($num,3)/fact(3); 

          while(abs($v1-$v2)>=$eps) {

             $v1 = $v2;
             $v2 += pow(-1.0,$n)* pow($num,2*$n+1) / fact(2*$n+1);
             $n++;  
          }

      return $v2;
    }

    echo"<h1>sin(x) = x - x^3/3! + x^5/5! - x^7/7! + ....(-1)^n+1*x^(2n+1)/(2n+1)!;</h1>";
    echo"<h1>sin(1.4)=?</h1>";
    echo sinus(1.4,50);
    echo"<br>"; 
    echo sin(1.4);
    echo"<br>"; 
    echo sinus2(1.4);

?>
