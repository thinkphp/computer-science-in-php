<center><img src="strategy.JPG"></center>
<h2 style="color:#0099ff;">Hack #71. Separate What from How with Strategies.</h2>
<?php


        class Car {

             public $name;
             public $speed;
             public $looks;
             public $mileage;

                       public function __construct($name,$speed,$looks,$mileage) {
                    
                              $this->name = $name;
                              $this->speed = $speed;
                              $this->looks = $looks;
                              $this->mileage = $mileage;

                       } 
         }//endclass


         class CompareWeightCar {

                      public function diff($a,$b) {

                           return abs($a-$b);
                      }

                      public function compareCar($car1,$car2) {
                        
                               $w = 0;

                               $w += $this->diff($car1->speed,$car2->speed); 

                               $w += $this->diff($car1->looks,$car2->looks);

                               $w += $this->diff($car1->mileage,$car2->mileage);

                        return($w);
                      }
         }//endclass

  
         class CarChooser {

              public $ideal;
              public $alg;

                  public function __construct($ideal,$alg){ 

                     $this->ideal = $ideal;

                     $this->alg = $alg;
                  } 

                  public function choose($listObjCars) {

                        $alg = $this->alg;

                        $minRate = null;

                        $foundCar = null;

                            foreach($listObjCars as $obj) {

                                 $rank = $alg->compareCar($this->ideal,$obj);

                                 if(!isset($minRate))  $minRate = $rank;

                                  if($minRate >= $rank) { $minRate = $rank;$foundCar = $obj;}
                                             
                            }//endforeach                       

                      return $foundCar;
                  }

         }//endclass

     function pickCar($ideal) {

        $records = array();            

          $carlist []= new Car( "zippy", 90, 30, 10 );
	  $carlist []= new Car( "logan", 45, 30, 55 );
	  $carlist []= new Car( "beauty", 40, 90, 10 );
	  $carlist []= new Car( "enviro", 40, 40, 90 );
 
           
       $wc = new CompareWeightCar();

       $obj = new CarChooser($ideal,$wc);

       $found = $obj->choose($carlist);
  
       echo$found->name."<br/>";  

     }

      echo"<b>Output:</b><br/>";
      pickcar(new Car("ideal",80,40,10));
      pickcar(new Car("ideal",40,90,10));
      pickcar(new Car("ideal",90,30,10));

  echo"<hr/>";
 
  $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

  echo$output;
         


?>