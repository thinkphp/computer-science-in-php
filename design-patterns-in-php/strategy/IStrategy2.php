<?php

    interface IStrategy {

         function sort($arr);
 
    }


    class selectByMin implements IStrategy{

        public function sort($vector) {

           $vec = $vector;

           $n = count($vec);

             for($i=0;$i<$n-1;$i++) {
 
                $min = $vec[$i];

                $k = $i;

                    for($j=$i+1;$j<$n;$j++) {

                           if($vec[$j] < $min) {

                               $min = $vec[$j];

                               $k = $j;

                           }//endif

                    };//endfor

                $vec[$k] = $vec[$i];

                $vec[$i] = $min;

             };//end for

           return $vec;
        }  

    }   

    class bubbleSort implements IStrategy {

        public function sort($arr) {

             $n = count($arr);

         do{

           $sorted = 1;
  
             for($i=0;$i<$n-1;$i++) {

                 if($arr[$i] > $arr[$i+1]) {

                      $aux = $arr[$i];
                      $arr[$i] = $arr[$i+1];
                      $arr[$i+1] = $aux;
                      $sorted = 0;
                 }
 
             }

          }while(!$sorted);  

         return $arr;
         
        }

    }

    //-findPivot
    //-sorteaza

    class quicksorting implements IStrategy {

        public $vector = array();

           public function findPivot($li,$ls,$k) {

                 $i=$li;$j=$ls;

                 $i1=0;$j1=-1;

                        while($i<$j) {

                                    if($this->vector[$i] > $this->vector[$j]) {
      
                                           $aux = $this->vector[$i];
                                           $this->vector[$i] = $this->vector[$j];
                                           $this->vector[$j] = $aux;
                                  
                                       $aux = $i1;
                                       $i1 = -$j1;
                                       $j1 = -$aux;
                                        
                                    }


                            $i = $i + $i1;   
                            $j = $j + $j1;   
                        }


                $k = $i;
           }



           public function sorteaza($li,$ls) {

                   if($li < $ls) {

                        $this->findPivot($li,$ls,&$k);

                        $this->sorteaza($li,$k-1);

                        $this->sorteaza($k+1,$ls);
                   }
 


           }
          
           public function sort($arr) {

                $this->vector = $arr;

                $n = count($arr);

                $this->sorteaza(0,$n-1);

             return $this->vector;
           }
 
    }


    class concretStrategy {
 
         public $arr = array();

              public function __construct($arr) {

                    if(!is_null($arr)) {

                       if(is_array($arr)) {

                           foreach($arr as $value) {

                               $this->arr[] = $value;
                           }
                       }
                    } 

              }

              public function doSort($obj) {

                     echo"<pre>";
                     print_r($obj->sort($this->arr));   
                     echo"</pre>";
              }    

    }
    


      $arr = array(9,8,7,6,5,4,3,2,1,0);

      $obj = new concretStrategy($arr); 

      echo"<h2>Selection by Minim</h2>";
      $obj->doSort(new selectByMin());  

      echo"<h2>Bubble Sort</h2>";
      $obj->doSort(new bubbleSort());  


      echo"<h2>Quick Sort</h2>";
      $obj->doSort(new quicksorting());  

?>