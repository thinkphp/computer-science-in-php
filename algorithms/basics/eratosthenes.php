<?php

function eratosthenes( $n ) {

    $sieve = array_fill(0, $n+1, 1);

    $primes = $n - 1;

    $i = 2;

    while($i * $i <= $n) {

       if($sieve[$i] == 1) {

          $j = 2;

          while($i * $j <= $n) {

             $multiply = $i * $j;

             if($sieve[$multiply] == 1) {

                $primes--;
             }

             $sieve[ $multiply ] = 0;

             $j++;
          }

          $i++;

       }

    }

    $output = array();

    for($i = 2; $i <= $n; $i++) {

      if($sieve[$i] == 1) {

        array_push($output, $i);
      }
    }

    return array($primes, $output);
}

function main() {

    $n = 10;

    $result = eratosthenes( $n );

    echo$result[0];

    echo"<pre>";
    print_r($result[1]);
    echo"</pre>";
}

main();
?>
