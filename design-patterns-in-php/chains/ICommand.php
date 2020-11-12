<?php

       interface ICommand {

           function onCommand($name,$args);
       }

       class buttonPICommand implements ICommand {

           public function onCommand($name,$args) {

                  if($name == "pi"){

                         print("<br/><b>PI handles $name with epsilon $args: 1-1/3+1/5-1/7+1/9-...</b>");

                         $EPSILON = $args;

                         $i = 5;

                         $semn = 1;

                         $v1 = 1.0;

                         $v2 = 1.0 - 1.0/3.0;

                         while( 4*($v2>$v1?$v2-$v1:$v1-$v2) >= $EPSILON) {

                             $v1 = $v2;

                             $v2 += $semn*(1.0/$i);
                             
                             $i +=2;

                             $semn = (-1)*$semn;  
                         }

                    $result = 4*$v2;

                    echo"<br/>PI with EPSILON $args : ".$result; 
           
                    return true;                 

                  }

             return false;

           }

       }//end class

       class buttonLNCommand implements ICommand {

           public function logn($a,$li,$ls) {

                  if($a == 1) return 0;

                         if( abs($li-$ls) < 0.001) return ($li+$ls)/2;  
 
                                         else if( (exp($li)-$a) * ( exp( ($li+$ls) / 2 )  - $a) < 0 ) return $this->logn($a,$li,($li+$ls)/2);  

                                                                                             else
                                                                                                      return $this->logn($a,($li+$ls)/2,$ls);
           }

           public function onCommand($name,$args) {

                     if($name == "logn") {

                          print("<br/><b>LN handles $name</b>");

                          $result = $this->logn($args,0,$args);

                          print("<br/>ln ($args) = $result");

                        return true;

                     }

                return false;

           }


       }//end class


       class buttonBINCommand implements ICommand {

                public function onCommand($name,$args) {

                       if($name == 'binary') {

                           print("<br/><b>BIN handles binary</b><br/>");

                         $nr = $args;

                         $flag = 0; 

                           for($i=15;$i>=0;$i--) {

                              if(($nr>>$i)&1 == 1) $flag=1; 

                               if($flag) printf("%d",($nr>>$i)&1);
                           }                  
            

                       }

                     return false; 

                }

       }

       class CommandChain {

             public $handles = array();

                 public function addCommand($handle) {

                           $this->handles[] = $handle;

                 }

                 public function runCommand($name,$args) {

                        foreach($this->handles as $handle) {

                             $command = $handle->onCommand($name,$args);

                             if($command) {
                                             return true;
                                          }

                        }

                 }

       }//end class


      $obj = new CommandChain();

      $obj->addCommand(new buttonLNCommand);
      $obj->addCommand(new buttonPICommand);
      $obj->addCommand(new buttonBINCommand);

      echo"<pre>"; 
      print_r($obj->handles);
      echo"</pre>";

      $obj->runCommand('logn',22);
      $obj->runCommand('binary',23);

?>