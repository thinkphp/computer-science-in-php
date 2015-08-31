<?php

      
    $n = 9213;
    echo$n; 
    $min = 10000;
    $max = 100;
    echo" : ";
    $m = intVal($n/10);
     
    $min = ($min + $m - abs($min-$m))/2;     
    $max = ($max + $m + abs($max-$m))/2;     

    echo$m; 
    echo" , ";
    $m = intVal($n/100)*10 + $n%10;
    $min = ($min + $m - abs($min-$m))/2;     
    $max = ($max + $m + abs($max-$m))/2;     

    echo$m;
    echo" , ";
    $m = intVal($n/1000)*100 + $n%100;
    $min = ($min + $m - abs($min-$m))/2;     
    $max = ($max + $m + abs($max-$m))/2;     

    echo$m;
    echo" , ";
    $m = $n%1000;
    $min = ($min + $m - abs($min-$m))/2;     
    $max = ($max + $m + abs($max-$m))/2;     

    echo$m;


    echo"<br>";
    echo"Min: ".$min."<br/>";
    echo"Max: ".$max;
    echo"<br>";


?>