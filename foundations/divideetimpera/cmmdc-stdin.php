<?php

    $nums = array();    
    $numbers = fgets(STDIN); 
    $nums = explode(" ",$numbers);

    for($i=0;$i<strlen($nums);$i++) {
        array_push($nums,(int)$nums[$i]); 
    }  

    function cmmdc($a,$b) {
          while($b) {
             $r = $a % $b;
             $a = $b;
             $b = $r;         
          }  
      return $a;  
    }

    function divimp($li,$ls) {
       global $nums;

         if($li<$ls) {
            $m = intval(($li+$ls)/2);
            $a = divimp($li,$m);
            $b = divimp($m+1,$ls);
            return cmmdc($a,$b); 
         }
       return $nums[$li];
    }

    echo divimp(0,count($nums)-1); 
?>