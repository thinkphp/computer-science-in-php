<?php if(php_sapi_name() != 'cli') { ?>


<center><h1 style="color:#0099ff;">Link Up Two Modules with an Adapter</h1></center> 
<p>
Use an adapter class to transfer data between two modules when you don't want to change the API of either module.Sometimes you have to get data from two objects, each of which uses a different data format. Changing one or both objects just isn't an option because you'll have to make all sorts of other changes in the rest of your code. One solution to this problem is to use an adapter class. An adapter is a class that understands both sides of the data-transfer fence and adapts one object to talk to another.
</p>

<?php }?>

<?php

     abstract class DataAdapter {

         abstract function getCount();

         abstract function getName($row); 

         abstract function getValue($row);
     }


    class Record {

       public $name;

       public $departement;

       public $age;

       public $salary;

               public function Record($name,$departament,$age,$salary) {

                     $this->name = $name;

                     $this->departament = $departament;

                     $this->age = $age;

                     $this->salary = $salary;

               }
    }//end class

    class RecordList {

         public $records = array();

          public function RecordList() {

                $this->records[] = new Record("Adrian","Mathematique",28,10000);

                $this->records[] = new Record("Surasky","Mathematique",28,20000);

                $this->records[] = new Record("Ledorf","Mathematique",28,30000);

                $this->records[] = new Record("Eistein","Mathematique",28,60000);

                $this->records[] = new Record("Newton","Mathematique",28,70000);
          }

         public function getRecords() {

                return $this->records;
         }

    }//end class


    class RecordGraphAdapter extends DataAdapter {

        private $data;
          
          public function __construct($data) {

               $this->data = $data->getRecords();
          }


          public function getCount() {

                 return count($this->data);
          }


          public function getName($row) {

                return $this->data[$row]->name;
          }


          public function getValue($row) {

                return $this->data[$row]->salary;
          }

    }  

    class GraphRender {

        private $adapter;

        private $gmin;

        private $gmax; 
       
          public function __construct($adapter) {

              $this->adapter = $adapter;              
          }

          protected function getMinMax() {
 
                   $this->gmin = 900000;
    
                   $this->gmax = -900000;

              for($i=0;$i < $this->adapter->getCount();$i++) {

                  $n = $this->adapter->getValue($i);

                  if($n < $this->gmin) $this->gmin = $n;

                  if($n > $this->gmax) $this->gmax = $n;

              } 
                             
          }

          public function WebRender() {

               $this->getMinMax();

               $ratio = 200 / ($this->gmax - $this->gmin);

               echo"<table>";     

               for($i=0;$i<$this->adapter->getCount();$i++) {

                   $n = $this->adapter->getName($i);

                   $v = $this->adapter->getValue($i);

                   $s = ($v-$this->gmin)*$ratio; 

                   echo"<tr><td>".$n." : </td><td><img src='poll.jpg' width='".$s."' height='20'></td></tr>"; 

               }

               echo"</table>";

          }


          public function TextRender () {

               $this->getMinMax();

               $ratio = 40 / ($this->gmax - $this->gmin);

               for($i=0;$i<$this->adapter->getCount();$i++) {

                   $n = $this->adapter->getName($i);

                   $v = $this->adapter->getValue($i);

                   $s = ($v-$this->gmin)*$ratio; 

                   echo(sprintf("%10s :",$n));

                   for($j=0;$j<$s;$j++) echo"*"; 

                echo"\n"; 
              }
          }

    }//end class


    $list = new RecordList();

    $adapter = new RecordGraphAdapter($list);

    $obj = new GraphRender($adapter);
 
    if(php_sapi_name() != 'cli') $obj->WebRender();

    if(php_sapi_name() == 'cli') $obj->TextRender();

   
  if(php_sapi_name() !== 'cli')  {  


  echo"<hr/><b>The Code:</b><br/><br/>";
 
  $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

  echo$output;

  }


?>