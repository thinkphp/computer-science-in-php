<?php
   /**
    *  Converts a number from base 10 to base 2
    *
    *  Author: Adrian Statescu <mergesortv@gmail.com> 
    *  License MIT
    */

    function tobin( $n ) {
          $bin = '';
          for($i=15;$i>=0;$i--) {
              $bin .= (($n>>$i)&1);  
          } 
       return $bin;
    } 
  
    //the output of the code above will be:
    echo "100 ( base 10 ) => ", tobin(8), " (base 2)";
?>