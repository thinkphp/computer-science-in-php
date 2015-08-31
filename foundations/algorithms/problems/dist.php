<?php

function display($str) {
 
     echo"<p><strong>".$str."</strong></p>";
}


class Point {

    public $x;
    public $y;

    public function __construct($a,$b) {

           $this->x = $a;
           $this->y = $b;
    }

    public function __toString(){

           return "(".$this->x.",".$this->y.")";  
    }
}


function distance(Point $p1,Point $p2) {

    return sqrt(($p1->x-$p2->x)*($p1->x-$p2->x)+($p1->y-$p2->y)*($p1->y-$p2->y)); 
}

/*
//version 1
display("Give number of points:");
$n = rand(4,10);
display("n=".$n);

display("Give me P0:");

$abs = rand(0,100);
$ord = rand(0,100);
$p0 = new Point($abs,$ord);
display($p0);

display('Second point:');
$abs = rand(0,100);
$ord = rand(0,100);
$p1 = new Point($abs,$ord);
display($p1);


$d = distance($p0,$p1);
display("Distance = ".$d);

$alpha = $abs;
$beta = $ord;

for($i=2;$i<=$n;$i++) {
display("P".$i);
$abs = rand(0,100);
$ord = rand(0,100);
   $p = new Point($abs,$ord);
   display($p);             
   $dist = distance($p0,$p);
   if($dist<$d) {$d = $dist;$alpha=$abs;$beta=$ord;}     
}

display("Distance min=".$d);
display("Coord point: P(".$alpha.",".$beta.")");
*/

//version 2
display("Give number of points:");
$n = rand(4,10);
display("n=".$n);

display("Give me Point 0");
$abs = rand(0,100);
$ord = rand(0,100);

$p0 = new Point($abs,$ord);
display("P0".$p0);
echo"<hr/>";
//read all points
$markers = array();

//read all points and compute the distance
for($i=1;$i<=$n;$i++) {
  $abs = rand(0,100);
  $ord = rand(0,100);
  $p = new Point($abs,$ord);
  array_push($markers,$p);    
}

$dist = 10000;

foreach($markers as $index=>$point) {
       display("P".($index+1).$point);
       $d = distance($p0,$point);
       display("D(P0,P".$point.")=".$d);
       if($d<$dist) {$dist = $d;$alpha = $point->x;$beta = $point->y;$ind = ($index+1);$ob = $point;}
       echo'<hr/>';   
} 

display("Min Distance = ".$dist);
display("Coords Point: P".$ind.$ob);

?>