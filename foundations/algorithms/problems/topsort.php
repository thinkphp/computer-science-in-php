<?php

class MyIterator {

          public $nodes;

          public function __construct( $arr ) {

                 if(is_array($arr)) {
 
                    $this->nodes = $arr;
                 }
          }

          public function fetch() {

                 $curr = each($this->nodes);

                 if($curr) {

                    return $curr['value'];

                 } else {

                   reset($this->nodes);

                   return false;
                 }

          }          
}

class Topsort {

    public $input = array();
    public $solutions = array();
    public $visited = array();
    public $matrix = array();

    public function __construct($in=NULL) {

           if(is_array($in) && $in != NULL) {

              $this->input = $in;    
           } 

           $this->read(); 
    } 

    public function read($debug=NULL) {

             $n = $this->input[0][0]; 
             $m = $this->input[0][1];

             for($j=1;$j<=$n;$j++) {
  
                 $x = $this->input[$j][0];
                 $y = $this->input[$j][1];

                 $this->matrix[$x][] = $y;
             }

             if(isset($debug)) {
                echo"<pre>";
                print_r($this->matrix);
                echo"<pre>";
             } 
    }

    public function solve() {

             $this->DFS(1);
    }

    public function solve2() {

             $this->DFS2(1);
    }

    public function DFS( $node ) {

      $this->visited[ $node ] = 1;

      if(is_array($this->matrix[$node])) {

         $obj = new MyIterator($this->matrix[ $node ]);
 
         while(($curr = $obj->fetch()) != false) {

                if( $this->visited[$curr] == 0 ) {

                   $this->DFS( $curr );
                }
         }  
      }

     array_push($this->solutions,$node);  
   }

    public function DFS2( $node ) {

      $this->visited[ $node ] = 1;

      array_push($this->solutions,$node);  

      if(is_array($this->matrix[$node])) {

         $obj = new MyIterator($this->matrix[ $node ]);
 
         while(($curr = $obj->fetch()) != false) {

                if( $this->visited[$curr] == 0 ) {

                   $this->DFS2( $curr );
                }
         }  
      }
   }

   public function solution() {

     return $this->reverse($this->solutions);  
   }

  public function solution2() {

     return $this->solutions;
   }

   public function reverse($arr) {

          $i = 0;
          $j = count($arr)-1;
 
          while($i<$j) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++;
                $j--;   
          }
     return $arr;
   }

}
 
$input = array(array(8,9),
               array(1,2),
               array(1,3),
               array(3,4),
               array(3,5),
               array(4,6),
               array(4,7),
               array(4,8),
               array(5,9));

$topsort = new Topsort($input);

$topsort->solve2();

echo"<pre>";
print_r($topsort->solution2());
echo"</pre>";
    
?>