<?php
function divideEtImpera($arr, $left, $right) {

         if($left == $right) {

            return $arr[ $left ];

         } else {

                $m = ($left + $right) >> 1;
                $a = divideEtImpera($arr, $left, $m);
                $b = divideEtImpera($arr, $m + 1, $right);
                if($a > $b) return $a;
                         else
                            return $b;
         }

}

?>
<h1>Divide et Impera</h1>
<h2>Finding <mark>MAX</mark>([list])</h2>
<?php

$arrayName = array(10,2,3,-1,0,2021,34,102,333);

echo"<pre>";
print_r($arrayName);
echo"</pre>";
$n = sizeof($arrayName) - 1;

$max = divideEtImpera($arrayName, 0, sizeof($arrayName) - 1);

?>

<strong>Max = <?php echo$max;?></strong>

<?php
echo"<br/>";
$source = show_source("findmax.php", true);
echo$source;
?>
