<style>*{margin:0;padding:3px;} body{font-family:arial;font-size:12px} h1{background-color:#0099ff;color:#fff;}</style>
<center><h1>Design Patterns - Observer Pattern</h1></center>
<p>
PHP applications, usually manipulate data. In many cases, changes to one piece of data can affect many different parts of your application's code. For example, the price of each product item displayed on an e-commerce site in the customer's local currency is affected by the current exchange rate. Now, assume that each product item is represented by a PHP object that most likely originates from a database; the exchange rate itself is most probably being taken from a different source and is not part of the item's database entry. Let's also assume that each such object has a display() method that outputs the HTML relevant to this product.
The observer pattern allows for objects to register on certain events and/or data, and when such an event or change in data occurs, it is automatically notified. In this way, you could develop the product item to be an observer on the currency exchange rate, and before printing out the list of items, you could trigger an event that updates all the registered objects with the correct rate. Doing so gives the objects a chance to update themselves and take the new data into account in their display() method.
Usually, the observer pattern is implemented using an interface called Observer, which the class that is interested in acting as an observer must implement.
Although the example isn't complete (the ProductItem class doesn't do anything useful), when the last line executes (the setExchangeRate() method), both $product1 and $product2 are notified via their notify() methods with the new exchange rate value, allowing them to recalculate their cost.
This pattern can be used in many cases; specifically in web development, it can be used to create an infrastructure of objects representing data that might be affected by cookies, GET, POST, and other input variables.
</p>

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

   interface Observer {

       function notify($obj);
   }

   class exchangeRate {

        static private $instance = NULL;

        public $observers = array();

        private $exchange_rate;

               private function exchangeRate() {

                   //constructor...
               }

               public static function getInstance() {

                     if(self::$instance == NULL) 
                               { 
                                  self::$instance = new exchangeRate(); 
                               }

                     return self::$instance; 
               } 

               public function getExchangeRate() {
 
                     return $this->exchange_rate;
               }

               public function setExchangeRate($new_rate) {

                      $this->exchange_rate = $new_rate;
                      $this->notifyObservers();                      
               }

               public function registerObserver($obj) {

                      $this->observers[] = $obj;
               }

               private function notifyObservers() {
                    
                        foreach($this->observers as $obj) {

                              $obj->notify($this);
                        }
               }

               

    }//end classs

 
    class productItem implements Observer {

                public function __construct() {

                         exchangeRate::getInstance()->registerObserver($this);

                }
 
                public function notify($obj) {

                     if($obj instanceof exchangeRate) {
 
                              print($obj->getExchangeRate());

                              print("Received Update!<br>");
                     }
                }

 
    }//end class

    $product1 = new productItem();

    $product2 = new productItem();

    echo"<pre>";
    print_r(exchangeRate::getInstance()->observers);
    echo"</pre>";


    exchangeRate::getInstance()->setExchangeRate(3.4);

          echo"<br/><br/><br/><hr/><br/><font color=\"red\"><b>Source of this script: </font></b><br/><br/>";

           
          $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

          echo$output; 



?>
<center><h1>Design Patterns - Observer Pattern</h1></center>
