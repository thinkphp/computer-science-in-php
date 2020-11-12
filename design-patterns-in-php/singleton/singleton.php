<?php

/*
 *
 * Book: PHP Hacks
 *
 * Chapter: Patterns
 *
 * Hack #77: Create Constant Objects with Singleton
 *
 */ 

   class Database {

       private static $instance = NULL;
       private $link;
       private $handle;
      

         private function Database(){

         } 

         private function __construct() {

            $this->link = new SQLiteDatabase('agenda.db');                       

            $this->handle = $this->link;
                     
          }

         public function getInstance() {
               
             if(self::$instance == NULL) 
                          {
                            self::$instance = new Database();           
                          }

               return self::$instance;
         } 
         
         public function get_handle() {

               return $this->handle;
         }
         

   }//end class


      echo"<center><h1>Hack #77. Create Constant Objects with Singletons</h1></center>";
      echo"<h3>A database wrapper singleton</h3>";

      echo"<h2>Output:</h2>";

      echo"<b>Query1:</b> <br/>";

      $result = Database::getInstance()->get_handle()->query('SELECT salary FROM people');

             echo"Salary:<br/>";

             while($result->valid()){

               $row = $result->current();

               echo$row['salary']."<br/>\n";  

               $result->next(); 
             } 

     echo"<b>Query2:</b> <br/>";

            echo"Firstname Lastname:<br/>";

     $result2 = Database::getInstance()->get_handle()->query('SELECT * FROM people');

             while($result2->valid()){

               $row = $result2->current();

               echo$row['firstname']." - ".$row['lastname']."<br/>\n";  

               $result2->next(); 

             } 


    echo"<hr/>";

    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;

?>