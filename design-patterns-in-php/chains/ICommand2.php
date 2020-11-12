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

       }//end class



       class buttomCIURCommand implements ICommand {

         public $sita = array();

             public function __construct() {

                  for($i=0;$i<14;$i++) $this->sita[$i] = 0;
             }           

             public function is_prim($n) {

                   return !$this->is_one($this->sita[$n/8],$n%8);

             }

             public function is_one($n,$pos) {

                      return ($n>>$pos)&1;

             }

             public function ciur() {

                   for($i=2;$i*$i<=100;$i++) {

                           if($this->is_one($this->sita[$i/8],$i%8) == 0) {

                                    $j=2;

                                         while( ($i*$j) <= 100) {
                                             
                                            $aux = 1; $aux <<= ($i*$j)%8;

                                            $this->sita[($i*$j)/8] |= $aux;
 
                                            $j++;
                                         }

                           }   

                   }

             }

             public function onCommand($name,$args) {

                  if($name == "ciur") {

                      $n = $args;

                      $this->ciur();


                       print("<br/><b>buttonCIURCommand handles ciur:</b><br/>");


                       print("<b>Nr prime pana la $n:</b><br/>");

                       for($i=2;$i<=$n;$i++) 

                                  if($this->is_prim($i)) echo$i." ";


                    return true;
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
      $obj->addCommand(new buttomCIURCommand);

      $obj->runCommand('logn',34);
      $obj->runCommand('pi',0.0001);
      $obj->runCommand('ciur',70);
      $obj->runCommand('binary',80);

 echo"<hr/>";

 echo"<br/>";

 echo"<b>The code: </b>";

 $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

 echo$output;

?>