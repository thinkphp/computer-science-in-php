<?php

    //computes greatest common factor from Array
    function cmmdc($a,$b) {

       while($b){ 
        $r = $a%$b;
        $a = $b;
        $b = $r;
      }

      return $a;
    }

    function divimp($li,$ls) {
        global $arr; 
      
        if($li<$ls) {
           $m = intval(($li+$ls)/2);
           $a = divimp($li,$m);
           $b = divimp($m+1,$ls);
           return cmmdc($a,$b); 
        }

     return $arr[$li];
    }

    $arr = array(20,30,50,70,90,100,120);

    echo"<pre>"; 
    print_r($arr);
    echo"</pre>";
    echo "cmmdc: ", divimp(0,count($arr)-1);

    //this trick computes the number maximum of vector
    $vec = array(90,12,14,22,333,44,90,123,12);


    function maxx($a,$b) {
         if($a>$b) {return $a;}
             else 
                   {return $b;}
    }

    function divetimp($li,$ls) {
        global $vec;
      
        if($li<$ls) {
           $m = intval(($li+$ls)/2);
           $a = divetimp($li,$m);
           $b = divetimp($m+1,$ls);
           return maxx($a,$b); 
        }

     return $vec[$li];
    }
 
    echo"<br/>";
    echo"<pre>"; 
    print_r($vec);
    echo"</pre>";
    echo "<br/>Max: " , divetimp(0,count($vec)-1);  
  
?>