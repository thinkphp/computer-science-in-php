<?php

function divimp($a,$li,$ls) {

     if(abs($li-$ls)<0.00001) {

        return (floatval($li+$ls)/2);

     } else if( (exp($li)-$a) * (exp(floatval(($li+$ls)/2))-$a) < 0) {
 
        return divimp($a, $li, floatval(($li+$ls)/2) );

     } else {

        return divimp($a, floatval(($li+$ls)/2), $ls);
     }
}

function ln( $a ){

   $li = 0;
   $ls = $a;

   if($a == 0) {

      return "-INF";
   }
 

   if($a < 0) {

      return "NAN";
   }

   if($a == 1) {

      return 0; 
   } 

   if($a < 1 && $a > 0) {

      return divimp($a,$li,-$ls-80);
   }

   if($a > 1) {

      return divimp($a,$li,$ls);
   }

}//end function

echo ln(0);
echo"</br>";
echo log(0);

?>