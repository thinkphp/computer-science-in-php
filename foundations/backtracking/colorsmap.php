<?php
/*
    0 1 0 1 0
    1 0 1 1 1
    0 1 0 0 1
    1 1 0 0 1
    0 1 1 1 0
 */

    $mat = array(
                1=>array(1=>0,2=>1,3=>0,4=>1,5=>0),
                2=>array(1=>1,2=>0,3=>1,4=>1,5=>1),
                3=>array(1=>0,2=>1,3=>0,4=>0,5=>1),
                4=>array(1=>1,2=>1,3=>0,4=>0,5=>1),
                5=>array(1=>0,2=>1,3=>1,4=>1,5=>0)
           );

    $st = array();
    $n = 5;

    function init() {
        global $st,$k;
        $st[$k] = 0;
    } 

    function have_successor() {
        global $st,$k;

        if($st[$k]<4) {
           $st[$k]++;
           return 1; 
        } 

      return 0;
    }

    function is_valid() {

        global $st, $k, $mat;
 
        for($i=1;$i<=$k-1;$i++) {
            if($st[$i] == $st[$k] && $mat[$i][$k] == 1) return 0; 
        }
       return 1;
    }

    function display() {

          global $st, $n;

          for($i=1;$i<=$n;$i++) {
              echo$st[$i]." "; 
          }

       echo"<br/>";
    }

    function solution() {
          global $k,$n;
          return $k == $n; 
    }

    function back() {
        global $k;

        $k = 1; init();

        while($k>0) {

        do{} while(($HS=have_successor()) && !is_valid());

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