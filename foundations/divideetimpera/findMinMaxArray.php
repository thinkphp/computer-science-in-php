<?php
  function divideEtImpera($arr, $lo, $hi, &$min, &$max) {

           if($lo == $hi) {

              $min = $max = $arr[ $lo ];
           } else {

              $m = ($lo + $hi) >> 1;
              divideEtImpera($arr, $lo, $m, $x, $a);
              divideEtImpera($arr, $m + 1, $hi, $y, $b);
              if($x < $y) $min = $x;
                        else
                          $min = $y;
              if($a > $b) $max = $a;
                         else
                          $max = $b;
           }
  };

  $arr = array(1,2,87,33,11,34,91,71);

  divideEtImpera($arr, 0, sizeof($arr) - 1, $min, $max);

  echo"MIN = ". $min;
  echo"\n";
  echo"MAX = ". $max;
  echo"\n";
?>
