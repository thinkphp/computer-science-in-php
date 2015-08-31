<?php

    function hanoi($n,$a,$b,$c) {
       if($n == 1) {
          echo$a."".$b." ";
       } else {
          hanoi($n-1,$a,$c,$b);
          echo$a."".$b." ";
          hanoi($n-1,$c,$b,$a);
       }
    } 

    $a = 'a'; $b = 'b'; $c = 'c';

    hanoi(4,$a,$b,$c);
?>