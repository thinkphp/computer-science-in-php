<?php

  function mss($arr) {

       $n = count($arr);

       $currentSum = 0;

       $maxsum = $arr[ 0 ];

       $start = 0;

       $possibleStart = 0;

       $end = -1;

       for ($i = 0; $i < $n; $i++) { 

       	    if($currentSum < 0) {
       	       $possibleStart = $i;	
       	    }
       	
            $currentSum = max($currentSum + $arr[$i], $arr[$i]);

            if ($currentSum > $maxsum) {
            	$maxsum = $currentSum;
            	$start = $possibleStart;
            	$end = $i;
            }
       }

       return $arrayName = array($maxsum, $start + 1, $end + 1);
  }
  
  $arrayName = array(5,-6,3,4,-2,3,-3);

  print_r( mss( $arrayName ) );

?>