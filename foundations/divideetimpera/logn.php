<?php
    /**
       Computes logarithm in base e of any number using bisect method and divide et impera
     */
    echo"<h1>Natural Logarithm</h1>";
    if(isset($_GET['n'])) {
           $a = $_GET['n'];
    } else {
           $a = 10;
    }
    function f($x) {
         global $a; 
         return exp($x)-$a;
    }

    function logn($a,$li,$ls) {
        if($a == 1) {
           return 0;
        }
        if(abs($li-$ls) < 0.000001) {
           return ($li+$ls)/2;
        }
        if(f($li)*f(($li+$ls)/2) < 0) {
           return logn($a,$li,($li+$ls)/2); 
        } else {
           return logn($a,($li+$ls)/2,$ls); 
        }
    }
  
    echo "Log($a) = ";
    if($a >= 1) {
       echo logn($a,0,$a); 
    } else if($a>0 && $a<1){
       echo logn($a,0,-$a-20);
    } else if($a == 0){
       echo"-INF";
    } else {
       echo"NAN";
    }
    echo"<br/>"; 
    echo "Log($a) = ", log($a);
?>