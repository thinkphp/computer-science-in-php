<?php

    $fp = fopen("fotografie.txt","r");

    $matrix = array(); 

    fscanf($fp,"%d\t%d",&$n,&$m);

    for($i=0;$i<$n;$i++) {
        fscanf($fp,"%d\t%d\t%d\t%d\t%d\t%d\t%d",$a,$b,$c,$d,$e,$f,$g);
        $matrix[$i][0] = $a;
        $matrix[$i][1] = $b;
        $matrix[$i][2] = $c;
        $matrix[$i][3] = $d;
        $matrix[$i][4] = $e;
        $matrix[$i][5] = $f;
        $matrix[$i][6] = $g;
    } 

    function colorate($i,$j,$col) {
        global $matrix,$n,$m;

        if($matrix[$i][$j] == 1 && $i>=0 && $j>=0 && $i<$n && $j<$m) {
           $matrix[$i][$j] = $col;
           colorate($i,$j+1,$col); 
           colorate($i,$j-1,$col); 
           colorate($i+1,$j,$col); 
           colorate($i-1,$j,$col); 
        }   
    }

    $col = 1;
    for($i=0;$i<$n;$i++) {
        for($j=0;$j<$m;$j++) {
            if($matrix[$i][$j] == 1) colorate($i,$j,++$col);
        }
    }

    for($i=0;$i<$n;$i++) {
        for($j=0;$j<$m;$j++) {
            echo$matrix[$i][$j]." ";
        }
        echo"<br/>";
    }
    fclose($fp);

?>