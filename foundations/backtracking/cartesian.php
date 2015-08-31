<?php

     //aranjamente & catesian product 

     $st = array();

     /**
       A = {1,2,3}; B = {1,2}; C = {1,2,3};
       AxBxC  
      */

     function init() {
         global $st,$k;
         $st[$k] = 0;
     }

     function have_successor() {
         global $st,$prod,$k;

         if($st[$k]<$prod[$k]) {
            $st[$k]++;
            return 1; 
         } 

        return 0; 
     } 

     function is_valid() {
         return 1; 
     }

     function solution() {
         global $n,$k;

          return ($n==$k);
     }

     function display() {
          global $st,$n;
          $out = "";
          for($i=1;$i<=$n;$i++) {
              $out .= $st[$i]." "; 
          }
       $out .= "\n";
       $fp = fopen("output2.txt","a");
       fwrite($fp,$out);
       fclose($fp);   
     }

     function back() {
         global $k;

          $k = 1; init();

          while($k > 0) {

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
     $inputs = array(); 
     while(!feof(STDIN)) {
           $line = fgets(STDIN);  
           array_push($inputs, $line);
     }

     $n = (int)$inputs[0];
     $prod = array();
     for($i=1;$i<=$n;$i++) {
         $prod[$i] = count(explode(" ",$inputs[$i]));         
     } 

     back();
?>