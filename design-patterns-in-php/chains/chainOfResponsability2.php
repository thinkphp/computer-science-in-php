<center><img src="chain.gif"></center>
<h2>Chain Of Responsability</h2>
<?php

         interface ICommand {

               public function onCommand($cmd,$args);
         }    

         class userCommand implements ICommand {

               public function onCommand($cmd,$args) {

                    if($cmd == 'addUser') { 

                        print("userCommand handling '$cmd' <br/>\n");

                        return true;

                    } 

                     return false;
               }

         } //end class

         class mailCommand implements ICommand {

               public function onCommand($cmd,$args) {

                    if($cmd == 'mail') { 

                        print("mailCommand handling '$cmd' <br/>\n");

                        return true;
                     }


                      return false;
               }

          }//end class

         class serviceCommand implements ICommand {

               public function onCommand($cmd,$args) {

                    if($cmd == 'service') { 

                        print("serviceCommand handling '$cmd' <br/>\n");

                        return true;
                     }


                      return false;
               }


         }//end class 

         class commandChain {
            
             private $handles_commands = array(); 

               public function __construct() {

               }

               public function __destruct()  {

               }

               public function addCommand($cmd) {

                     $this->handles_commands[] = $cmd;
               }
 
               public function runCommand($cmd,$args) {
                  
                     foreach($this->handles_commands as $handle) {

                            if($handle->onCommand($cmd,$args)) {

                                     return true;
                            }
                     }

               }
               
         }//end class


         $obj = new commandChain();

         $obj->addCommand(new userCommand());
         $obj->addCommand(new mailCommand());
         $obj->addCommand(new serviceCommand());

         $obj->runCommand('addUser',null);  
         $obj->runCommand('mail',null);  
         $obj->runCommand('service',null);  




    echo"<hr/>";
 
    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;

?>