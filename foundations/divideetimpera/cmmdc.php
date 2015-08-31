<?php

    function gdc($a,$b) {
         if($b == 0) {return $a;}
          else return gdc($b,$a%$b);
    }

    $arr = array(10,20,30,40,50,60,70,80,90,100,200,300,1000);

    function divimp($li,$ls) {
        global $arr;

             if($li<$ls) {
                $m = intval(($li+$ls)/2); 
                $a = divimp($li,$m);  
                $b = divimp($m+1,$ls);
                return gdc($a,$b);
             }

        return $arr[$li]; 
    }
    $old = microtime(true);    
    echo "The greatest common factor: " . divimp(0,count($arr)-1); 
    echo"<br/>Time spent: ";
    echo microtime(true) - $old; 
?>