<?php

/*
 *
 * Book: PHP Hacks
 *
 * Chapter: Patterns
 *
 * Hack #77: A Singleton array of states
 *
 */ 

      echo"<center><h1>Hack #77. Create Constant Objects with Singletons</h1></center>";
      echo"<h3>A Singleton Array of states</h3>";

      class StateList {

         private $states = array();
         private static $instance = NULL;

           private function StateList() {

           }

           public function addState($state) {
                
              $this->states[] = $state;
           } 

           public function getStates() {

               return $this->states;
           }

           public static function getInstance() {

                if(self::$instance == NULL) {
                     
                      self::$instance = new StateList();
                }

               return self::$instance;
           }

      }//end class;


      StateList::getInstance()->addState("Book");
      StateList::getInstance()->addState("Cars");
      StateList::getInstance()->addState("Computers");
      StateList::getInstance()->addState("Livres");
      echo"<h2>Output:</h2>";
      echo"<pre>";    
      print_r(StateList::getInstance()->getStates()); 
      echo"</pre>";

    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;


?>
