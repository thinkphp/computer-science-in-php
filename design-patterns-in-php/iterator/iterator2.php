<?php

    class myIterator implements Iterator {

         private $phrase;
         public $max;       
         public $start;

                public function __construct($sentence) {

                       $this->phrase = explode(" ",$sentence);

                       $this->max = count($this->phrase);

                       $this->start = 0;
                }

                public function rewind() {

                       $this->curr = $this->start;
                }

                public function valid () {

                       return $this->curr < $this->max; 
                } 

                public function next() {

                       $this->curr++;
                }

                public function current() {

                       return $this->phrase[$this->curr];
                } 

                public function key() {
                    
                       return $this->curr;
                }
                            
    }      

     $obj = new myIterator("Nu-ti fie teama ca inaintezi prea incet teme-te daca te opresti");


     foreach($obj as $key=>$value) {

        print("obj[$key] = $value <br/>");
     } 

    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;  

?>  