<?php

$arr = array ('a', 'b', 'c', 'c', 'd', 'e', 'e','e', 'e', 'e', 'f', 'e', 'f', 'e','f', 'a', 'a', 'a', 'f', 'f', 'f');

 echo"<pre>";
 print_r($arr);
 echo"</pre>";	

 $prev = '';
 $count = 0;

        echo"Date de intrare: ";

        foreach($arr as $item) {

            echo$item." ";
        } 
 
        echo"<hr/>";

        echo"Return: <br/>";

        foreach($arr as $item) {

             if($prev == $item) {  
 
                 $count++; 
      
                 if($count == 2) echo"<strong>";
             }

            if($prev != $item) {

                 if($count >= 2) echo"</strong>";

                 $count = 0;
            }


            echo$item;

            $prev = $item;
        } 

       if($count >=2) echo"</strong>";




?>