<?php
/*
 * 
 * Fibonacci
 * 0,1,1,2,3,5,8
 *
 */

$fib = array();

      //recursive   
      function fibonacci_rec( $n ) {

        global $fib;
       
        if($n == 0) return 0;
 
               else

                   if($n == 1) return 1;

                     else {
                        
                       return $fib[ $n ] = fibonacci_rec( $n - 1 )+fibonacci_rec( $n - 2 );   
                          
                     }  
      }


    //iterative
    function fibonacci_iterativ($n) {
          $a = 0;

          $b = 1;

          echo$a.",".$b.",";
  
          for($i = 3; $i <= $n; $i++) {

                $result = $a + $b;
 
                $a = $b;
          
                $b = $result;  
      
                echo$b.",";
          }
      
     }

          fibonacci_rec(20);

          echo"0, 1, ";

          for($i = 2 ; $i <= 20; $i++) echo $fib[ $i ] . ", ";
          

?>