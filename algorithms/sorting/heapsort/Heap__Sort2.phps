<?php

    class HeapSort {

          function __construct( $arr ) {

                   $this->Heap = array();

                   $this->len = sizeof( $arr );

                   $this->sizeHeap = 0;

                   for($i = 0; $i < $this->len; $i++) {

                       $this->insertHeap($arr[ $i ]);
                   }
          }

          function insertHeap( $val ) {

                  $this->Heap[ ++$this->sizeHeap ] = $val;

                  $this->up( $this->sizeHeap );
          }

          function up( $child ) {

                  $parrent = intval($child / 2);  

                  while( $parrent > 0 ) {

                        if($this->Heap[ $parrent ] > $this->Heap[ $child ]) {

                           $this->_swap($parrent, $child);

                           $child = $parrent;

                           $parrent = intval($child / 2);

                        } else break;  
                  }
          }

          function down( $parrent ) {

                  while( 2 * $parrent <= $this->sizeHeap ) {

                        $child = 2 * $parrent;

                        if(2 * $parrent + 1 <= $this->sizeHeap && $this->Heap[ 2 * $parrent + 1 ] < $this->Heap[ 2 * $parrent ]) $child++;

                        if($this->Heap[ $parrent ] <= $this->Heap[ $child ]) break;

                        $this->_swap($parrent, $child);

                        $parrent = $child;
                  }
          }

          function removeHeap() {

                   $val = $this->Heap[ 1 ];

                   $this->Heap[ 1 ] = $this->Heap[ $this->sizeHeap-- ];

                   $this->down( 1 );

                   return $val;
          }

          function sort() {

                   for($i = 1; $i <= $this->len; $i++) print $this->removeHeap() . " ";
          }

          function _swap($a, $b) {

                $x = $this->Heap[ $a ] ^ $this->Heap[ $b ];

                $this->Heap[ $a ] = $x ^ $this->Heap[ $a ];

                $this->Heap[ $b ] = $x ^ $this->Heap[ $b];
          }

          function get() {

              return $this->Heap;
          }
             
    }

    $arr = array(9,8,7,6,5,4,3,2,1); 

    $ob = new HeapSort($arr);

    echo"<h1>Heap Sort</h1>";
    echo"<h2>Input</h2>";
    print_r("<pre>"); 
    print_r($arr);
    print_r("</pre>");

    echo"<h2>Output (Sorted)</h2>";
    $ob->sort();  

?>