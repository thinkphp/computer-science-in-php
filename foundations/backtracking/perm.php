<?php
    $st = array();
    $vec = array(1=>'a',2=>'b',3=>'c');
   
    function init() {
       global $k,$st;

       $st[$k] = 0;
    }

    function is_valid() {
       global $k,$st;

          for($i=1;$i<$k;$i++) {
              if($st[$i] == $st[$k]) {
                 return 0; 
              } 
          }
       return 1;
    } 

    function solution() {
       global $k,$n;

       return $k == $n;
    }

    function display() {
      global $st,$n,$vec;    
          for($i=1;$i<=$n;$i++) {
              echo $vec[$st[$i]]." ";  
          }
      echo"<br/>";
    }

    function have_successor() {
         global $st,$k,$n; 
         if($st[$k]<$n) {
            $st[$k]++;
            return 1; 
         }
       return 0;
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

 
    $n = 3;
    back();
  

?>