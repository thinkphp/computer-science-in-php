<body>
<h1>Binary Search</h1>
<ul>
  <li>iterative</li>
  <li>recursive</li>
</ul>
<?php
function searchBin($arr, $lo, $hi, $search) {

         if($lo <= $hi) {

            $m = ($lo + $hi) >> 1;

            if($arr[ $m ] == $search) return($m);

            else if($arr[$m] > $search) {

                  return searchBin($arr, $lo, $m - 1, $search);
            } else {

                  return searchBin($arr, $m + 1, $hi, $search);
            }

         }
         return -1;
}

function searchBin2($arr, $lo, $hi, $search) {

         if($lo > $hi) return -1;

            $m = ($lo + $hi) >> 1;

            if($arr[ $m ] == $search) return($m);

            else if($arr[$m] > $search) {

                  return searchBin($arr, $lo, $m - 1, $search);
            } else {

                  return searchBin($arr, $m + 1, $hi, $search);
            }
}

function binSearch($arr, $lo, $hi, $search) {
         $pos = -1;

         while($lo <= $hi) {

               $m = ($lo + $hi) >> 1;
               if($arr[$m] == $search) {
                  $pos = $m;
                  break;
               } else if($arr[$m] > $search) {
                  $hi = $m - 1;
               } else {
                  $lo = $m + 1;
               }
         }
         return $pos;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$arr = array(-9,-3,-1,10,87,88,118,180,280,480,580,780);

echo"<pre>";
print_r($arr);
echo"</pre>";

$n = sizeof($arr);

$search = -3;

$pos = binsearch($arr, 0, $n - 1, $search);

echo"Search: ". $search;
echo"<br>";
echo"<mark>Find</mark> at: ". $pos;
?>
<style>
body {
  font-size: 30px
}
</style>
</body>

<?php
$source = show_source("searchbin.php", true);
echo$source;



?>
