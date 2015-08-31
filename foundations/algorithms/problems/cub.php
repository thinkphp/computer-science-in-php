<?php

/*
      Book: 
            Practical C Programming

   Problem: 
            Cuburi
   
      Page:
            330 

      Felix are o pasiune pentru jocurule cu cuburi. El le aseaza unul
      peste altul si construieste coloane de diferite inaltimi. II arata surorii 
      sale opera laudandu-se cu zidul pe care l-a construit, dar aceasta ii 
      reproseaza: "Ca sa fie zid trebuie sa aiba toate coloanele de aceeasi inaltime!".
      moment in care Felix si-a dat seama ca are dreptate.Asa ca s-a gandit sa rearanjeze
      cuburile unul cate unul astfel incat coloanele obtinute sa aiba aceeasi inaltime.Il 
      puteti ajuta pe Felix sa realizeze acest lucru printr-un numar minim de mutari?

           Data de intrare: 

                          In fisierul cuburi.in se gasesc mai multe cazuri de n coloane pe
                          care Felix l-a construit. Pe o linie se afla numarul n de stive, pe 
                          urmatoarea se afla n numere naturale reprezentand inaltimile celor n stive
                          Consideram ca 1 <= n <= 50 si 1 <= hi <= 100.Numarul total de cuburi este divizibil
                          cu numarul de stive, astfel incat vom putea construi n coloane de aceeasi inaltime.
                          Datele de intrare se incheie la citirea lui n = 0. Acest set de date nu trebuie procesat.

           Date de iesire: 

                          pentru fiecare caz asa cum s-a prezentat mai sus trebuie afisate doua propozitii:
                                   numarul cazului si numarul minim de mutari in forma din exemplu:

                          cub.in           cub.out
                          ----------------------------------------------
                          6             |  Cazul#1
                          5 2 4 1 7 5   |  Numarul minim de mutari este 5.
                          6             |  Cazul#2
                          4 7 2 3 9 5   |  Numarul minim de mutari este 6

                         
         
*/

$vec = array();

$fin = fopen('cub.in',"r");

$fout = fopen('cub.out',"w");

$caz = 0;


      function readInput() {

          global $vec,$fin,$n;

               $string=""; 

               for($i=0;$i<$n;$i++) $string.="%d ";

               $list = fscanf($fin,$string);

               $vec = $list;

       }

      function solve() {

         global $vec,$n,$result;
 
             
           $result = 0;
 
           $s = 0;

             for($i=0;$i<$n;$i++) $s = $s + intVal($vec[$i]);           

                    $aux = intVal($s/$n);
              
             for($i=0;$i<$n;$i++) {

                   if($vec[$i] < $aux) $result += $aux - $vec[$i];
             }              

                     
      }

      function printOutput() {

          global $result,$caz,$fout;

            $caz++; 

            fprintf($fout,"Caz#%d\n",$caz);

            printf("Caz#%d",$caz);
       
            echo"<br/>";

            fprintf($fout,"Numarul minim de mutari este: %d\n",$result);

            echo"Numarul minim de mutari este: ".$result;

      }   


           while(fscanf($fin,"%d",$n) && $n>0) {

               readInput(); 

               solve();                 

               printOutput();

               echo"<br/>"; 

           } 


fclose($fin);

fclose($fout);

$output = highlight_file($_SERVER['SCRIPT_FILENAME']);

echo$output; 

?>