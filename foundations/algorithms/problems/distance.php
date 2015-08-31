<?php
//version 1
/*
function printing($str){
echo"<p>".$str."</p>";
}

printing("<h1>Minim distance between points</h1>");

echo"First point:";
$x0 = 11;
$y0 = 14;
printing("P0(".$x0.",".$y0.")");

printing("Give me n=");$n = 5;printing($n);

printing("First point:");
$x1 = 70;$y1 = 70;
printing("<strong>P1(".$x1.",".$y1.")</strong>");
$dist = sqrt(($x0-$x1)*($x0-$x1)+($y0-$y1)*($y0-$y1));
echo"D=".$dist;
$alpha = $x1;$beta = $y1;
$n = 5;
for($i=2;$i<=$n;$i++) {
    printing("Read P".$i);
    $a = rand(0,100);
    $b = rand(0,100);
    printing("<strong>P".$i."(".$a.",".$b.")</strong");   
    $d = sqrt(($x0-$a)*($x0-$a)+($y0-$b)*($y0-$b));
    printing($d);
    if($d < $dist) {$dist = $d;$alpha = $a; $beta = $b;}    
}

printing("Minimum Distance =".$dist." with point(".$alpha.",".$beta.")");
*/

function display($str) {
echo"<p><strong>".$str."</strong></p>";
}

display("<h1>Input:</h1>");
$input = "Se considera un punct P0 in plan si o multime A de n puncte. Realizati un program care determina cel mai apropiat punct de P0 din multimea A si distanta corespunzatoare. Datele de intrare se vor citi de la tastatura si rezultatele se vor citi pe ecran.";
display("<h1>".$input."</h1>");

//version 2
class Point {

   public $x;
   public $y;

   public function __construct($a,$b) {
        $this->x = $a;
        $this->y = $b;
   }

   public function __toString() {

       return "P(".$this->x.",".$this->y.")";
   }
}


function distance(Point $p1,Point $p2) {

   return sqrt(($p1->x-$p2->x)*($p1->x-$p2->x)+($p1->y-$p2->y)*($p1->y-$p2->y));
}

display("<h1>Output:</h1>");

display("P1");
$p0 = new Point(10,20);
echo$p0;
display("P2");
$p1 = new Point(rand(0,100),rand(0,100));
echo$p1;
$d = distance($p0,$p1);
display("Distance = ".$d);

display("Give me n=");
$n = rand(5,15);
display($n);

$alpha = $p1->x;
$beta = $p1->y;
$index = 1;
for($i=2;$i<=$n;$i++) {
    display("Give P".$i);
    $p = new Point(rand(0,100),rand(0,100));
    display($p); 
    $dist = distance($p0,$p);
    if($dist < $d) {$d = $dist;$alpha = $p->x;$beta = $p->y;$index=$i;}  
}//end for

 display("Minimum Distance = ".$d.' with P'.$index.'('.$alpha.','.$beta.')');  
?>