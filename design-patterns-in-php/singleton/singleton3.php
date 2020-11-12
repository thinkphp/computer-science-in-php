<center><h1 style="background-color:#0099ff;color:#fff">Singleton Pattern</h1></center>
<p>
Singleton is a design pattern that is useful when you want to create an object that should be accessible for different, distinct parts of your application. Especially if this object is supposed to contain large chunks of information, instantiating it over and over again may prove to be extremely inefficient. Instead, if you had a way of sharing the same instance between all of the different parts of the application, it would be ideal. Of course, global variables come to mind, but they require you to manage initialization. That is, you must make sure that nobody erases this variable by mistake, that nobody instantiates another instance of this class, and so forth. Relying on the application code to properly use the infrastructure is definitely not object-oriented. In object-oriented design, you would instantiate your own class to expose an API allowing you to take care of these things in the class itself instead of having to rely on every piece of application code to maintain system integrity.
The constructor is private. A Singleton class is one of the few situations in which it makes sense to use a private constructor. The private constructor prevents users from instantiating the class directly. They must use the getInstance method. Trying to instantiate the class using $obj = new Singleton will result in a fatal error, since the global scope may not call the private constructor.
</p>
<a href="corephp.ini">corephp.ini</a>
<?php

    class Configuration {
        
        //data members
        private static $instance = NULL;

        public $ini_settings = array();

        private $updated = FALSE;

        const INI_FILENAME = 'c:\wamp\www\oop\DesignPatterns\singleton\corephp.ini'; 


              private function __construct() {

                   if(file_exists(self::INI_FILENAME)) {
           
                      $this->ini_settings = parse_ini_file(self::INI_FILENAME);

                   }
              }

             public function __destruct() {

                   
                  //if updated is false then return
                  if(!$this->updated) {

                        return;
                  }

                  $fp = fopen(self::INI_FILENAME,"w");

                  if(!$fp) {

                        return; 
                  } 

                  foreach($this->ini_settings as $key=>$value) {

                     fputs($fp,"$key = \"$value\"\n");

                  }

                  fclose($fp);
             }
              

             public static function getInstance() {

                     if(self::$instance == NULL) {
 
                             self::$instance = new Configuration();
                     }

                        return self::$instance;
              }


             public function get($property) {

                if(isset($this->ini_settings[$property])) {

                               return $this->ini_settings[$property];

                }   else   {

                               return(NULL); 
                           }


             }  

             public function set($name,$value) {

                    if( !isset($this->ini_settings[$name])  || $this->ini_settings[$name]!=$value) {

                         $this->ini_settings[$name] = $value;

                         $this->updated = TRUE;
                    }

             }

             
             

    }//end class

    echo"<hr><b> Output:  </b><br/>";

    echo"<pre>";     
    print_r(Configuration::getInstance()->ini_settings);
    echo"</pre>";

    Configuration::getInstance()->set("procesor","intel");

    Configuration::getInstance()->set("limbaj","php");

    Configuration::getInstance()->set("username","adrian");

    Configuration::getInstance()->set("password","parola");

    Configuration::getInstance()->set("framework","mootools");

    Configuration::getInstance()->set("framework","phpCake");

    echo "Get - username : ". Configuration::getInstance()->get("username");

    echo"<br>"; 

    echo "Get - password : ". Configuration::getInstance()->get("password");    

   echo"<hr><b> The Code: </b><br/>";

   $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

   echo$output; 
?>

<center><h1 style="background-color:#0099ff;color:#fff">Singleton Pattern</h1></center>