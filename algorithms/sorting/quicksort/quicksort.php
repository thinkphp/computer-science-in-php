<?php

function qs($lo, $hi, &$arr) {

  $i = $lo;
  $j = $hi;

  $piv = $arr[ ($lo + $hi) >> 1 ];

  while($i <= $j) {

      while($arr[$i] < $piv) $i++;
      while($arr[$j] > $piv) $j--;
      if($i<=$j) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
        $i++;$j--;
      }
  }
  if($i<$hi) {
    qs($i, $hi, $arr);
  }
  if($lo < $j) {
    qs($lo, $j, $arr);
  }
}

function quicksort( &$arr ) {

         qs(0, count($arr)-1, $arr);
}

function main() {

   $arrayName = array(1119,8,7,6,5,-3,2,1,0,100);

   print_r( $arrayName );

   quicksort( $arrayName );

   print_r($arrayName);
}

main()
?>
