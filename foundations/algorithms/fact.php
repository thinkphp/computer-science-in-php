<?php
   /**
    *  Factorial n! = n (n-1)!
    *
    *  5! = 5 4! = 5 4 3! = 5 4 3 2! = 5 4 3 2 1! = 5 4 3 2 1 = 120
    *
    *  Author: Adrian Statescu <mergesortv@gmail.com> 
    *  License MIT
    */

    //recursive solution 1 with collector on queue like common lisp
    function factorial($n, $r) {

           if($n == 1) {

              return $r;  

           } else {

              return factorial($n - 1, bcmul($r, $n));
           }
    } 

    //recursive solution
    function factorial2($n) {

           if($n == 1) {

              return 1;  

           } else {

              return $n * factorial2($n-1);
           }
    } 

    //iterative solution
    function factorial3($n) {

          $p = 1;

          for($i = 1; $i <= $n; $i++) {

              $p = $p * $i; 
          } 
       return $p;
    } 

    //iterative solution with while
    function factorial4($n) {
             $p = 1;
             $x = $n;
 
             while(1) {

                 if($x == 1) {

                    return $p; 

                 } else {

                    $p = $p * $x;

                    $x = $x - 1;
                 }
             }
    }

    //iterative solution with do/while
    function factorial5($n) {

             $p = 1;

             $x = $n;

             do {

                $p = $p * $x;

                $x--;

             }while($x!=1); 

        return $p;
    }

    echo "10!=",factorial2(10);  
?>