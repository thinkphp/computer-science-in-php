<?php

/*
 * Book: PHP 5 Power Programming
 *
 * Chapter: PHP5 Advanced OOP and Design Patterns
 *
 * Section: Iterators
 *
 */

    class NumberSquared implements Iterator {

        private $start;
        private $end;  

          public function __construct($start,$end) {

               $this->start = $start;

               $this->end = $end; 
          } 

          public function rewind() {

               $this->curr = $this->start; 

          }

          public function valid() {

                return($this->curr <= $this->end);

          }

          public function next() {

                $this->curr++; 

          }

          public function current() {

               return pow($this->curr,2);               

          }


          public function key() {

                return $this->curr;  

          } 
    }

    echo"<h2>Output:</h2>";

    $obj = new NumberSquared(3,10);

    foreach($obj as $key=>$value) {

         print("The square of $key is $value<br/>");
    }

    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;  
?>