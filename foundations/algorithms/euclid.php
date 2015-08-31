<?php


/**
 * 
 * Euclid's algorithm
 *
 */
  //iterative, solution 1
  function euclid($a,$b) {

       while($b) {

         $r = $a%$b;
 
         $a = $b;

         $b = $r;
       }
        
      echo$a;
   }

   //iterative, solution 2
   function euclid2( $a, $b ) {

       while( $b != 0 ){

          list( $a, $b ) = array( $b, $a % $b );
       }

      return $a;
   }

    //recursive, solution 3
    function euclid_rec($a,$b) {

          if( $b == 0 ) return $a;

             else
                        return euclid_rec($b,$a%$b);

    }

    echo "cmmdc(10,3) = " , euclid(10,3);


  
?>