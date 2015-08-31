<?php
/*
    0 1 0 0 0 1
    1 0 1 0 1 1
    0 1 0 1 1 1
    0 0 1 0 1 0
    0 1 1 1 0 1
    1 1 1 0 1 0
 */

    $mat = array(
                1=>array(1=>0,2=>1,3=>0,4=>0,5=>0,6=>1),
                2=>array(1=>1,2=>0,3=>1,4=>0,5=>1,6=>1),
                3=>array(1=>0,2=>1,3=>0,4=>1,5=>1,6=>1),
                4=>array(1=>0,2=>0,3=>1,4=>0,5=>1,6=>0),
                5=>array(1=>0,2=>1,3=>1,4=>1,5=>0,6=>1),
                6=>array(1=>1,2=>1,3=>1,4=>0,5=>1,6=>0)
           );

    $st = array();
    $n = 6;

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

        global $mat, $st, $k, $n;

        if(!$mat[$st[$k-1]][$st[$k]]) {return 0;}
           else {
                for($i=1;$i<=$k-1;$i++) {if($st[$i] == $st[$k]) return 0;}
                if($k == $n && !$mat[1][$st[$k]]) {return 0;}
                return 1; 
           }
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

        $k = 2; init();

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
    $st[1] = 1;
    back();
?>