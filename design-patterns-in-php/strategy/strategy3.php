<center><h1 style="color:#0099ff;">Strategy Design Pattern</h1></center>
<?php

         interface IStrategy {

             public function sort($arr);
         }   

         class bubbleSort implements IStrategy {
              
             public function sort($arr){
              
                  $n = count($arr);;
          
                  do{

                      $sorted=1; 
                 
                      for($i=0;$i<$n-1;$i++) {

                            if($arr[$i]>$arr[$i+1])
                              {
                                $aux = $arr[$i];
                                $arr[$i] = $arr[$i+1];
                                $arr[$i+1] = $aux;
                                $sorted = 0;  
                              }
                      } 

                    }while(!$sorted);
                
                return $arr;      
              }  
      
         }//end class

         class selectByMinSort implements IStrategy {

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

         }//end class;  

 
         class quickS implements IStrategy {

             public $vector = array();

                public function pivot($li,$ls,$k) {

                   $i = $li; $j = $ls; $i1 = 0; $j1 = -1;

                           while($i < $j) {

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

                public function quick($li,$ls) {

                        if($li < $ls) {

                             $this->pivot($li,$ls,&$k);

                             $this->quick($li,$k-1);

                             $this->quick($k+1,$ls);  
                        }    

                }               
 
                public function sort($arr) {

                   $this->vector = $arr;  

                     $this->quick(0,count($this->vector)-1); 

                   return $this->vector;
                }
  
         }//end class

         class UserList {

            public $records;
  
                 public function __construct($arr){

                     if(!is_null($arr)) {

                         foreach($arr as $item){

                                 $this->records[] = $item;
                         }
                     }
    
                 }

                public function doSort(IStrategy $obj){

                    return $obj->sort($this->records);
                } 
          
 
         }//end class

         $arr = array(9,8,55,23,43,93,77,24,53,19); 

         echo"<h2>Input:</h2>";
         echo"<pre>";  
         print_r($arr);
         echo"</pre>";          
         $obj = new UserList($arr);

         echo"<h2>Ouput:</h2>";

         echo"<h3>Bubble Sort Strategy</h3>";
         echo"<pre>";  
         print_r($obj->doSort(new bubbleSort()));
         echo"</pre>";          

         echo"<h3>Selection By Minim Strategy</h3>";
         echo"<pre>";  
         print_r($obj->doSort(new selectByMinSort()));
         echo"</pre>";          

         echo"<h3>Quick Sort Strategy</h3>";
         echo"<pre>";  
         print_r($obj->doSort(new quickS()));
         echo"</pre>";          


  echo"<hr/>";
 
  $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

  echo$output;

?>