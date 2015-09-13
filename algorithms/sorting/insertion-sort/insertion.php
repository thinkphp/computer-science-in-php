<?php

  $arr = array(9,8,7,6,5,4,3,2,1,0);

  echo"<pre>";
  print_r($arr);
  echo"</pre>";

  function insertion($arr) {

     $n = count($arr);

     for($i=1;$i<$n;$i++) {

         $temp = $arr[$i];
 
         for($j=$i-1;$j>=0;$j--) {

             if($arr[$j] > $temp) {

               $arr[$j+1] = $arr[$j]; 

             } else {

               break;
             }

         }

         $arr[$j+1] = $temp;
     }

     return $arr;
  }


  function insertion2($arr) {

      $n = count($arr);

      for($i=1;$i<$n;$i++) {

           $temp = $arr[$i];

           for($j=$i-1;$j>=0;$j--) {

                if($arr[$j]->cheie > $temp->cheie) {

                   $arr[$j+1] = $arr[$j];

                } else {

                   break;
                }
           }  

           $arr[$j+1] = $temp;  
      } 

    return $arr;
  }

  $arr = insertion($arr);

  echo"<pre>";
  print_r($arr);
  echo"</pre>";


  class Element {
      public $cheie;
      public $text;       
  }

  $vec = array();

  for($i=0;$i<3;$i++) {
      $ob = new Element;
      $ob->cheie = rand(0,10); 
      $ob->text = "Adrian-".$ob->cheie;
      $vec[] = $ob;
  }    

  

  $vec = insertion2($vec);

  echo"<pre>";  
  print_r($vec);
  echo"</pre>";

  //------------- Insertion Sort ----------

  class Sorting {

        public $arr;

        public $n;

        public function __construct($arr) {

               $this->arr = $arr;  

               $this->n = count($arr); 
        }


        public function insertion() {

               $n = $this->n;

               for($i=1;$i<$n;$i++) {

                    $temp = $this->arr[$i];

                    for($j=$i-1;$j>=0;$j--) {

                        if($this->arr[$j] > $temp) {

                           $this->arr[$j+1] = $this->arr[$j]; 

                        } else {

                           break;
                        }
                    }

                    $this->arr[$j+1] = $temp;
               }                       
        }

        public function __toString() {

               $out = '';

               for($i=0;$i<$this->n;$i++) {

                    $out .= $this->arr[$i].' '; 
               } 

            return "Vector: [".$out."]";
        }
  }

  $arr = array(9,8,7,6,5,4,3,2,1);

  $ob = new Sorting($arr);
  echo$ob; 
  echo"<br/>";
  $ob->insertion();
  echo$ob;

  $vec = array(11,12,13,14,15,18,20);


  //binary search iterative
  function searchbin($desired) {

        global $vec;     

        $li = 0;

        $ls = count($vec);

        $found = 0;

        $pos = -1;

        do {

            $m = intVal(($li+$ls)/2);

            if($desired == $vec[$m]) {$pos = $m;$found = 1;} 

               else if($desired > $vec[$m]) {

                    $li = $m + 1;

               } else {

                    $ls = $m - 1;
               }
             
        }while($li<=$ls && !$found);

    return array("found"=>$found,"position"=>$pos);
  }

  $resp = searchbin(11);

  //print_r($resp);  


  //binary search recursive
  function searchBin_rec($li,$ls,$search,$vec) {

           if($li<=$ls) {

              $m = intVal(($li+$ls)/2);

              if($vec[$m] == $search) {return array("found"=>"true","pos"=>$m);} 

              else if($search < $vec[$m]) {

                      return searchBin_rec($li,$m-1,$search,$vec);

              } else {

                      return searchBin_rec($m+1,$ls,$search,$vec);
              }

           } else {
 
             return array("found"=>"false");  
           }        
  }

  $vec = array(11,12,13,14,15,18,20);

  echo"<pre>";
  print_r($vec);  
  echo"</pre>";
  $search = 15;
  echo"Search: ".$search;
  echo"<br/>";
  echo"<pre>";
  print_r(searchBin_rec(0,count($vec)-1,$search,$vec));
  echo"</pre>";

  $vector = array(9,8,7,6,5,4,3,2,1,0);

  function displayValues($vector) {

         $n = count($vector);

         $out = ''; 

         for($i=0;$i<$n;$i++) {

             $out .= $vector[$i].' ';
         } 

     echo$out.'<br/>';
  }

  function insertionSortModified() {

      global $vector;

      displayValues($vector); 

      $n = count($vector);

      for($i=1;$i<$n;$i++) {

          $li = 0;

          $ls = $i-1;

          $temp = $vector[$i];

          while($li<=$ls) {

              $m = intVal(($li+$ls)/2);

              if($temp > $vector[$m]) {

                   $li = $m + 1;

              } else {

                   $ls = $m - 1;
              }  
          } 

          for($j=$i-1;$j>=$li;$j--) {
 
              $vector[$j+1] = $vector[$j];  
          }

          $vector[$li] = $temp;             

          displayValues($vector); 
      }
        
  }  //end function

    

  echo"<pre>";
  print_r($vector);
  echo"</pre>";

  insertionSortModified();

  echo"<pre>";
  print_r($vector);
  echo"</pre>";

?>