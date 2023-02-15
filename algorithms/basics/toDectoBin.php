<?php

function toBin( $n ) {

    if( $n / 2 ) {

      toBin( intVal( $n / 2 ) );
    }

    echo$n % 2, "";
}

function toBin2( $n ) {

    $arr = array();

    $k = 0;

    while( $n ){

      $arr[ $k ] = $n % 2;
      $k++;
      $n = intVal( $n / 2 );
    }

    $k--;
    for($i = $k; $i >= 0; $i--) {

      echo$arr[ $i ]."";
    }
}

function toBin3($n) {

  //we display the number on 8 bits
  $size = 8;

  for($i = $size; $i >= 0; $i--) {

      echo($n>>$i)&1;
  }
}

function pow2($a, $b) {
    $p = 1;
    for($i = 1; $i<=$b; $i++) {
        $p = $p * $a;
    }
    return $p;
}

function toDec($bin) {

     $dec = 0;
     $base = 2;
     $power = 0;

     while($bin>0) {
       $dec += ($bin % 10) * pow2($base,$power);
       $power++;
       $bin = intval($bin / 10);
     }

     return $dec;
}

$n = 11;

toBin($n);
echo"\n";
toBin2($n);
echo"\n";
toBin3($n);
echo"\n";
echo toDec(111110);
?>
