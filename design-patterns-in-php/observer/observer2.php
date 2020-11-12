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




   interface IObservable {

         function registerObserver($obj);
   }


   interface IObserver {
      
         function notify($obj,$name);
   }


    
   class cartItem implements IObservable {

           public $observers = array();

         public function cartItem(){

         }

         public function registerObserver($obj) {

               $this->observers[] = $obj;

         }   

         public function notifyObservers($element) {

                //notify observers
                foreach($this->observers as $obj) {                              
 
                   $obj->notify($this,$element);

                }    
         }
                        
         public function addItem($element) {
              
                $this->items = $element;

                $this->notifyObservers($element);
         } 

   }

   class myObserver implements IObserver {

        public function notify($obj,$name) {
           
              if($obj instanceof cartItem)
 
                 print("Add to cart: $name<br>\n");  
        }   

   }

   echo"<h2>Output:</h2>";  

   $cart = new cartItem();

   $cart->registerObserver(new myObserver());

   $cart->addItem("book");

   $cart->addItem("computers");

   $cart->addItem("modems");


          echo"<br/><br/><hr/><br/><font color=\"red\"><b>Source of this script: </font></b><br/>";

           
          $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

          echo$output; 


     
?>
<center><h1>Design Patterns - Observer Pattern</h1></center>