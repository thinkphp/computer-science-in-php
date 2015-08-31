<?php
/*
  Book: Practical C Prgramming

  Problem: "Sa taiem pizza"

  Page: 333

  Intr-o zi Felix a fost rugat sa taie o pizza in sapte bucati pentru a o distribui prietenilor.Dimensiunile bucatilor
  de pizza nu trebuie neaparat sa fie identice, deci putem obtine o bucata mai mica sau mare decat alta. El s-a gandit 
  un pic si a ajuns la concluza ca poate sa taie pizza din trei taieturi drepte astfel incat sa rezulte sapte bucati.
  Incercati sa realizati o performanta similara cu ajutorul computerului!Adica dat fiind numarul de linii drepte, calculati 
  numarul maxim de bucati care se pot obtine.

   date de intrare: in fisierul pizza.in se gasesc mai multe cazuri de test, cate unul pe linie( 0 <= N <= 210.000.000)
                    fiecare linie reprezentand numarul de linii drepte.Un numar negativ incheie lista cazurilor din 
                    fisierul de intrare.

   date de iesire:  in fisierul pizza.out vor trebui scrise numarul maxim de bucati de pizza ce se pot obtine pentru fiecare
                    numar dat din fisierul de intrare

              ------------------------------------------------------------------------
              |pizza.in        |          pizza.out                                  |
              ------------------------------------------------------------------------
              |0               |   0 taieturi ---> 1 bucati                          |
              |1               |   1 taieturi ---> 2 bucati                          |
              |2               |   2 taieturi ---> 4 bucati                          |
              |5               |   5 taieturi ---> 15 bucati                         |
              |6               |   6 taieturi ---> 22 bucati                         |
              |7               |   7 taieturi ---> 29 bucati                         |
              |8               |   8 taieturi ---> 37 bucati                         |
              |9               |   9 taieturi ---> 46 bucati                         |
              |10              |   10 taieturi ---> 56 bucati                        |
              |678             |   678 taieturi ---> 230182 bucati                   |
              |9043            |   9043 taieturi ---> 40892447 bucati                |
              |21000000        |   210000000 taieturi ---> 22050000105000001 bucati  |   
              |-100            |                                                     |
              ------------------------------------------------------------------------

*/

        $vec = array();          

        function operatie($a,$b) {
         
         global $vec;

              $k = 0;

              $t = 1;

            while($a) {

               $c = $a%10;

               $a = intVal($a/10);

               $vec[$k++] = ($t + $c*$b)%10;  

               $t = intVal(($t + $c*$b)/10);

            } 

             while($t) {

                 $vec[$k++] = $t%10;

                 $t = intVal($t/10);
             }
           
        }   

        function display() {

          global $vec,$fout;

          $bucati = "BUCATI";
                  
               for($i=count($vec)-1;$i>=0;$i--) {
                  
                   fprintf($fout,"%d",$vec[$i]);                    
                
                   echo$vec[$i];                

               } 
           
             fprintf($fout," %s\n",$bucati);

        }   

        $fin = fopen('pizza.in',"r");

        $fout = fopen('pizza.out',"w");

        while(fscanf($fin,"%d",$n) && $n>=0) {

              fprintf($fout,"%d taieturi ---> ",$n);

              echo$n." taieturi ---> ";

              if($n%2 == 0) operatie($n+1,$n/2);

                     else

                       operatie($n,($n+1)/2);  

              display();
 
              echo" bucati!";

              echo"<br/>";
        }

fclose($fin);

fclose($fout);

$output = highlight_file($_SERVER['SCRIPT_FILENAME']);

echo$output; 
 
?>