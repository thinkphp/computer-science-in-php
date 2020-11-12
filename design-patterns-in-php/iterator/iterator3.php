<?php

          class myQuote implements IteratorAggregate {

               public $phrase;

               private $start;

               private $max;


                     public function __construct($sentence) {
             
                           $this->phrase = explode(" ",$sentence);

                           $this->start = 0;

                           $this->max = count($this->phrase);
                          
                     }

                    public function getIterator() {

                           return new myIterator($this);
                    }

                    public function getMax() {

                           return $this->max; 
                    } 

                    public function getStart() {

                           return $this->start;
                    }

                   

          }//end class

          class myIterator implements Iterator {

              private $obj;
            
                  public function __construct($obj) {

                      $this->obj = $obj;
                  }

                 public function rewind() { 

                      $this->curr = $this->obj->getStart(); 
                 }

                 public function valid() {

                      return $this->curr < $this->obj->getMax();
                 }

                public function next() { 

                      $this->curr++;
                }

                public function key() {

                      return$this->curr;
                }


                public function current() {

                      return $this->obj->phrase[$this->curr]; 
                }    
          } 

          $obj = new myQuote("Nu indraznim nu pentru ca este greu, e greu pentru ca nu indraznim!");

          echo"<h2>Output: </h2>";

          foreach($obj as $key=>$value) {

               print("obj[$key] = $value <br>\n");
          }

    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;  


?>