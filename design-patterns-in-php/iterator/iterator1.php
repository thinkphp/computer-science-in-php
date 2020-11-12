<?php
      class NumberSquaredIterator implements Iterator {
     
            public $obj;

               public function __construct($obj) {

                    $this->obj = $obj;
               }

               public function rewind() {

                    $this->curr = $this->obj->getStart();
               }

               public function valid() {

                    return($this->curr <= $this->obj->getEnd());

               }

               public function next() {

                    $this->curr++;
               }

               public function current() {

                   return(pow($this->curr,2));

               } 

               public function key() {

                   return $this->curr; 
               }

      }

      class NumberSquared implements IteratorAggregate {

          private $start;
          private $end;

                 public function __construct($start,$end) {

                      $this->start = $start;
                      $this->end = $end;
                 } 

                 public function getIterator() {

                     return new NumberSquaredIterator($this);
                 } 

                 public function getStart() {

                     return($this->start);
                 }

                 public function getEnd() {

                     return($this->end);
                 }              

       }
       
      echo"<h2>Output:</h2>";

      $obj = new NumberSquared(1,10);

      foreach($obj as $key=>$value) {

           print("The square of $key is $value <br/>");
      }

    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;  

?>