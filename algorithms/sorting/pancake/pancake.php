<?php

    class Sort {

          function __construct($arr) {

                 $this->vec = $arr;
 
                 $this->n = sizeof($arr);

                 $this->doPancake(); 
          } 

          function doPancake() {

                 for($curr_size = $this->n; $curr_size > 1; $curr_size--) {

                     $iMax = $this->_find($curr_size);

                     if($iMax != ($curr_size-1)) {

                        $this->_flip($iMax);  

                        $this->_flip($curr_size-1);
                     }
                 }

          }

          function get() {

                 return $this->vec;
          }

          function set($arr) {

                 $this->vec = $arr;
          }

          function _flip($index) {

                   $start = 0;

                   while($start < $index) {

                         $tmp = $this->vec[$start];

                         $this->vec[$start++] = $this->vec[$index];

                         $this->vec[$index--] = $tmp;
                   }  

          }

          function _find($index) {

              $iMax = 0;

              for($i = 1; $i < $index; ++$i) {

                  if($this->vec[$i] > $this->vec[$iMax]) $iMax = $i;
              }  

              return $iMax;
          }
    }; 

    $arr = array(9,8,7,6,5,4,3,2,1,0);

    echo"<h1>Pancake in Action (Complexity worst-case performance O(n^2))</h1>";
    echo"<h2>Input unsorted array</h2>";
    echo"<pre>";
    print_r($arr);
    echo"</pre>";

    $ob = new Sort($arr);

    echo"<h2>Output Sorted array</h2>";
    echo"<pre>";
    print_r($ob->get());       
    echo"</pre>";

?>