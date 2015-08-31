<?php
   /**
    *  Euler's Number
    *
    *  Author: Adrian Statescu <mergesortv@gmail.com> 
    *  License MIT
    */

   //e = 1 + 1/1! + 1/2! + 1/3! + 1/4!... -> |e(n+1)-e(n)| < epsilon e(n+1), e(n) with two succesive approximations of e!

    function factorial($n) {
             if($n == 1 or $n == 0) return 1;
                else {
                     return $n*factorial($n-1);
                } 
    }

    /**
     * The e functions returns the value of Euler's constant (approximately 2,7183...)
     */
    function e($eps=0.0001) {

             $EPSILON = $eps;

             $v1 = 2;

             $v2 = $v1 + floatval(1.0/factorial(2));

             $i = 3;

             while(($v1>$v2 ? $v1-$v2 : $v2-$v1) > $eps) {

                  $v1 = $v2;

                  $v2 += floatval(1.0/factorial($i));

                  $i++;
             }
 
         return $v2;
    } 

    //the output of the code above will be:
    echo"<h1>Euler's Number</h1>";
    echo "PHP built-in =>". exp(1) ."<br/>\n";
    echo "my  => ", e();
?>