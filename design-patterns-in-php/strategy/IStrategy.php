<?php

       interface IStrategy {

              function sort($arr);     
       } 

       class bubbleSort implements IStrategy {

          public function sort($arr) {

                $n = count($arr);

                do {

                   $sorted = 0;
 
                    for($i=0;$i<$n-1;$i++) {

                         if($arr[$i] > $arr[$i+1]) {

                              $aux = $arr[$i];

                              $arr[$i] = $arr[$i+1];

                              $arr[$i+1] = $aux;

                              $sorted = 1;
                         } 
                    }

                } while($sorted);


                 return $arr; 
              }              
       }


       class selectbymin implements IStrategy {

          public function sort($arr) {

                 $n = count($arr);

                 for($i=0;$i<$n-1;$i++) {

                     $min = $arr[$i];

                     $k = $i;

                          for($j=$i+1;$j<$n;$j++) {

                               if($arr[$j] < $min) {

                                   $min = $arr[$j];
 
                                   $k = $j;
                               }
                          }

                      $arr[$k] = $arr[$i];

                      $arr[$i] = $min;
                 }               

                 return $arr;
             }
             
       }

       class shell implements IStrategy {


          public function sort($arr) {

                   $n = count($arr);

                   $h = array(5,3,1);

                   for($m=0;$m<3;$m++) {

                       $k = $h[$m];

                          for($i=$k;$i<$n;$i++) {

                               $x = $arr[$i];

                                    for($j=$i-$k;($j>=0 && $arr[$j] > $x);$j-=$k) {

                                           $arr[$j+$k] = $arr[$j];
                                    }

                              $arr[$j+$k] = $x;
                          } 

                   }

                  return $arr; 
             } 
       }
 

     class quicksort implements IStrategy {

         private $v = array();

           public function poz($li,$ls,$k) {

               $i = $li;$j = $ls;$i1 = 0;$j1 = -1;

                        while($i<$j) {

                               if($this->v[$i] > $this->v[$j]) {

                                       $aux = $this->v[$i];

                                       $this->v[$i] = $this->v[$j];

                                       $this->v[$j] = $aux;
 
                
                                    $aux = $i1;

                                    $i1 = -$j1;

                                    $j1 = -$aux;   
                               }

                          $i = $i + $i1; 

                          $j = $j + $j1;
                        } 

                $k = $i;
             }

           public function quick($li,$ls) {

                      if($li < $ls) {

                             $this->poz($li,$ls,&$k);  

                             $this->quick($li,$k-1);

                             $this->quick($k+1,$ls);
                      } 
            }
              
           public function sort($arr) {

                  $this->v = $arr;

                  $n = count($arr);

                  $this->quick(0,$n-1);

                return $this->v;   
             } 
   
       }


       class concretStrategy {

          public $vec;

           public function __construct($input) {

                   if(!is_null($input)) {
                   
                       if(is_array($input)) {

                              foreach($input as $key=>$elem) {

                                     $this->vec[] = $elem;
                              }
                       }
                    }
              }

           public function doSort($obj) {

                     return $obj->sort($this->vec);  
              }
       }

       $arr = array(9,8,7,6,5,4,3,2,1,0);

       $c = new concretStrategy($arr);
       echo"<h1>Input:</h1>";
       echo"<pre>";  
       print_r($c->vec); 
       echo"</pre>";

       $output = $c->doSort(new bubbleSort());
       echo"<h1>Output:</h1><h3>bubble sort</h3>";
       echo"<pre>";  
       print_r($output); 
       echo"</pre>";


       $output = $c->doSort(new selectbymin());
       echo"<h1>Output:</h1><h3>select by min</h3>";
       echo"<pre>";  
       print_r($output); 
       echo"</pre>";

       $output = $c->doSort(new shell());  
       echo"<h1>Output:</h1><h3>shell</h3>";
       echo"<pre>";  
       print_r($output); 
       echo"</pre>";


       $output = $c->doSort(new quicksort());  
       echo"<h1>Output:</h1><h3>quicksort</h3>";
       echo"<pre>";  
       print_r($output); 
       echo"</pre>";

                
       $output = highlight_file($_SERVER["SCRIPT_FILENAME"]);

       echo$output; 
?>