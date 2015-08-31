<?php

    //vector solution construct progressiv
    $st = array();

    //number of queens
    $n = 4;

    function init() {
         global $st, $k;

         $st[$k] = 0;
    }

    function have_successor() {
         global $st,$k,$n;

         if($st[$k]<$n) {
            $st[$k]++;
            return 1;
         }
      return 0;
    }

    function is_valid() {
         global $st,$k;

         for($i=1;$i<$k;$i++) {
             if( ($st[$i] == $st[$k]) && (abs($st[$i]-$st[$k]) == abs($i-$k)) ) return 0; 
         }
      return 1;
    } 

    function solution() {

        global $k,$n;
 
        return $k == $n;
    }

    function display() {
        global $st,$n;

        for($i=1;$i<=$n;$i++) {
            echo$st[$i]. " ";
        }
        echo"<br/>";
    } 

    function back() {
       global $k;
  
         $k = 1; init();

         while($k>0) {

               do{}while(($HS=have_successor()) && !is_valid());

               if($HS) {
                 if(solution()) {
                   display();
                 } else {
                   $k++;init(); 
                 } 
               } else {
                   $k--;
               }              
         }           
    }

    back(); 
?>