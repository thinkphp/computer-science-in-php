<h1>Divide Et Impera - Sum Array => 1 + 2 + 3 + ...+ 10 = 55</h1>
<?php

function divide($lo, $hi, &$m) {

       $m = ($lo + $hi) >> 1;
}

function combo($a, $b, &$c) {

   $c = $a + $b;
}

function divideEtImpera($arr, $lo, $hi, &$z) {

         if($lo == $hi) {

              $z = $arr[ $lo ];

         } else {
              divide($lo, $hi, $m);
              divideEtImpera($arr, $lo, $m, $a);
              divideEtImpera($arr, $m + 1, $hi, $b);
              combo($a,$b,$z);
         }
}

$arr = array(1,2,3,4,5,6,7,8,9,10);

divideEtImpera($arr, 0, sizeof($arr) - 1, $z);
echo"Sum 1 + 2 + 3 + ...+ 10 = ". $z;
echo"<br/><br/><br/><br/>Source:";
$source = show_source("sumN.php", true);
echo$source;
?>
