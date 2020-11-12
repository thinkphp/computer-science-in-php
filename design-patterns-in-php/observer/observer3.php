<style>*{margin:0;padding:3px;} body{font-family:arial;font-size:12px} h1{background-color:#0099ff;color:#fff;}</style>
<center><h1>Design Patterns - Observer Pattern</h1></center>
<?php
/*
 *
 * Book: PHP 5 Power Programming
 * 
 * Chapter: PHP 5 Advanced OOP and Design Pattern
 * 
 * Section: Design Patterns - Observer
 *
 */


     interface IObserver {

          function notify($item);        
     }

     class Subject {

        public $observers = array();

        private $vector = array();
           
      
                public function __construct() {
             
                }
  
                public function registerObserver($obj) {

                $this->observers[] = $obj;
                }

                public function notifyObserver($element) {

                       foreach($this->observers as $obs){

                             $obs->notify($element);
                       } 
                }

                public function addItem($element) {

                       $vector [] = $element; 

                       $this->notifyObserver($element);                   
                }

      }

      class myObserver implements IObserver {

           function notify($element) {

                  print("Notify: '$element' add to List! <br>\n");
           } 

      }
      
      echo"<h2>Output:</h2>";  

      $list = new Subject();

      $observer = new myObserver();

      $list->registerObserver($observer);

      $list->addItem("adrian"); 

      $list->addItem(2); 

      $list->addItem("zeev"); 


          echo"<br/><br/><hr/><br/><font color=\"red\"><b>Source of this script: </font></b><br/>";

           
          $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

          echo$output; 


?>
<center><h1>Design Patterns - Observer Pattern</h1></center>