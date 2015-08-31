<form action="<?php echo$_SERVER['PHP_SELF'];?>" method="POST">
Table(NxN): <input type="text" name="n" id="n" size="3">
</form>

<?php

      
  //generate n! & dame
      
     $stack = array();

     if(!isset($_REQUEST['n'])) $n = 4;
                    else
                                $n = $_REQUEST['n'];

     function init() {
        global $st,$k;
      
       $st[$k] = 0;
     }

     function have_successor() {
        global $k,$st,$n;

        if($st[$k] < $n) {

         $st[$k]++;
         return 1;
        } 

          return 0;   
     }   

     function is_valid() {
        global $k,$st;

         for($i=1;$i<$k;$i++) {

            if($st[$i] == $st[$k] || (abs($st[$i]-$st[$k])) == abs($i-$k)) return 0;
         }    
 
         return 1;
     }

     function solution() {
        global $k,$n;
 
         return($k == $n);
     } 

     function printSolution() {
       global $st,$n;

           for($i=1;$i<=$n;$i++) echo$st[$i]." ";

           for($i=1;$i<=$n;$i++) $mat[$i][$st[$i]] = $st[$i]; 
 
           echo"<table border='1' cellspacing='5' cellpadding='10' style='background: url(back.jpg)'>";

           for($i=1;$i<=$n;$i++) {
           
            echo"<tr>";
                       
              for($j=1;$j<=$n;$j++) {

                 if($mat[$i][$j]) echo"<td><img src='regina.png'></td>";

                       else
                                  echo"<td>&nbsp;</td>";
              }

            echo"</tr>";
               
           }
           echo"</table>";

      echo"<br/>";
     }


     function back() {

        global $k;

         $k=1;init();

       while($k>0){

 
         do{} while(($HS=have_successor()) && !is_valid());
       
             if($HS) {

                       if(solution()) {

                                        printSolution();

                                      } else {
                                               $k++;
                                               init(); 
                                             } 
 
                     } else {

                              $k--;

                            } 

                   }
     }//end back

     back();
      

?>
