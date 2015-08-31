<?php
   /**
    *  Computes SQuare RooT in PHP SQRT
    *
    *  Author: Adrian Statescu <mergesortv@gmail.com> 
    *  License MIT
    */

   //sqrt = 1/2(An+n/An)

    /**
     * 
     */
    function mySQRT($n) {
        $an = 1;
        for($i=1;$i<=100;$i++) {
            $an = ($an + floatval($n/$an))*1/2;
        }   
       return $an;
    } 

    //the output of the code above will be:
    echo"<h1>SQRT</h1>";
    echo "sqrt(2) [built-in function] = ", sqrt(2);
    echo"<br/>";
    echo "sqrt(2)[my function] ", mySQRT(2);
    echo"<br/>";
    echo"&copy; Adrian Statescu 2013 &lt;mergesortv@gmail.com&gt;";
?>