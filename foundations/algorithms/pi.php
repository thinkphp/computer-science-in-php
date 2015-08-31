<?php

   //Computes the value of PI using infinite series
   //4*(1- 1/3 + 1/5 - 1/7 + 1/9 +...)


function myPI($eps=0.00001) {

  $EPSILON = $eps;

  $semn = 1;
 
  $v1 = 1.0;

  $v2 = 1.0 - 1.0/3.0;

  $i = 5;

       while( 4* ($v2 > $v1 ? $v2-$v1 : $v1-$v2 ) >= $EPSILON ) {

         $v1 = $v2;

         $v2 += $semn * 1.0/$i;

         $semn = (-1)*$semn;

         $i += 2;
       }

     return 4*$v2;
}

echo "PI(built-in)= ", pi()."<br/>";
echo "PI = ", myPI(0.000001);

?>