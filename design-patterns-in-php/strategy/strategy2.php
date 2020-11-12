<center><img src="strategy.gif"></center>
<h2 style="color:#0099ff;">Strategy</h2>

<?php
     
     interface IStrategy {

          public function filter($name);
     } 

     class findAfterFilter implements IStrategy {

            public $filter;

                    public function __construct($filter) {

                        $this->filter = $filter;  
                    }

                    public function filter($name) {

                        return (strcmp($this->filter,$name) <= 0);
                    } 
     }



     class findAfterFilter2 implements IStrategy {

            public $filter;

                    public function __construct($filter) {

                        $this->filter = $filter;  
                    }

                    public function filter($name) {

                        return (strcmp($this->filter,$name) == 1);
                    } 
     }


     class findAfterRandomFilter implements IStrategy {

                    public function filter($name) {

                          return (rand(0,1) >=0.5);
                    } 

     } 

     class UserList {

         public $users = array();

              public function __construct($arr) {

                    if($arr != NULL) {

                         foreach($arr as $value) {

                            $this->users[] = $value;
                         } 
                    }
              }

              public function addUser($name){
                  
                  if(isset($name)) $users[] = $name;  
              }

              public function find($obj) {

                  $records = array();                   

                   foreach($this->users as $user){

                        if($obj->filter($user)) $records[] = $user;
                   }

                return $records;
               }  
 

     }//end class

          
       $users = array("Adrian","Andrew","Balzac","Baril","Celsius","Danemarca","Flag","Microsoft","Philips","Ledorf","Rasmus");

       $find = new UserList($users);
 
       $filter = new findAfterFilter("F");

       $result = $find->find($filter);
 
       echo"<pre>";
       print_r($result);    
       echo"</pre>";       

       $filter2 = new findAfterRandomFilter();

       $result = $find->find($filter2);     

       echo"<pre>";
       print_r($result);    
       echo"</pre>";       

       $filter3 = new findAfterFilter2("F");
       $result = $find->find($filter3);     

       echo"<pre>";
       print_r($result);    
       echo"</pre>";       


  echo"<hr/>";
 
  $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

  echo$output;


?>