<center><img src="visitor.JPG"></center>
<h2 style="color:#0099ff;">Ease Data Manipulation with Vizitor</h2>

<?php
      abstract class RecordVisitor {

            abstract function visitRecord($rec);
      }


      class Record {
        
            public $name;

            public $age;

            public $salary;

                      public function Record($name,$age,$salary) {

                           $this->name = $name;
                           $this->age = $age;
                           $this->salary = $salary;
                      }
      }//end class

      class RecordList {

            public $records = array();

                   public function RecordList() {

                         $this->records[] = new Record("Rasmus",20,23);  

                         $this->records[] = new Record("Zeev",20,111);

                         $this->records[] = new Record("Adrian",20,3);

                         $this->records[] = new Record("lancia",20,11);
                   }    

                   public function iterate($obj) {

                        foreach($this->records as $record) {

                              call_user_func(array($obj,"visitRecord"),$record);
                             
                        }
                   }


                  public function __toString(){

                    $output = '';

                       foreach($this->records as $rec){
                        
                            $output .= $rec->name." - ".$rec->age." - ".$rec->salary."<br/>";
                    
                       }   
                          return $output;
                  }

                 public function displayAsTable() {


                    echo"<table border=\"1\">";

                    echo"<thead><th>Name</th><th>Age</th><th>Salary</th></thead>";

                       foreach($this->records as $rec){
                        
                            echo"<tr><td>".$rec->name."</td><td>".$rec->age."</td><td>".$rec->salary."</td></tr>";
                    
                       }   

                    echo"</table>";

                 }
  
      }//end class

      class MinSalaryFinder extends RecordVisitor{

           public $min = 10000;

                public function visitRecord($rec) {

                       if($rec->salary < $this->min) $this->min = $rec->salary;
                 }

      }//end class


       //Output : Run this Script
       echo"<b>Output:</b><br/>";

       $r = new RecordList();

       $r->displayAsTable();  

       $minSal = new MinSalaryFinder();

       $r->iterate($minSal);

       echo"Min = ".$minSal->min;

         

  echo"<hr/>";
 
  $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

  echo$output;
         


?>