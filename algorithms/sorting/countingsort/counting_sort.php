<?php

function func(){

    $arr = array(-9,8,7,6,5,4,3,1,-2,-3);

    $size = count($arr);

    $b = array_fill(0, $size, 0);

    $c = array();

    $c = $arr;

    for($i = 0; $i < $size - 1;$i++) {

       for($j = $i + 1; $j < $size;$j++) {

            if($arr[$i] > $arr[$j]) {
              $b[$i]++;
            }  else {
              $b[$j]++;
            }
       }
    }

    for($i = 0; $i < $size;$i++) {
      $arr[$b[$i]] = $c[$i];
    }

    print_r($arr);
}

func()

?>
