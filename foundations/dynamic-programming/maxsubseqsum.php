<?php
// The Maximum Subsequence Sum Problem
// -----------------------------------
// Given (possibly negative) integers a1, a2, a3,...,an find the maximum value of E k=i...j.
// The maximum subsequence sum is defined to be 0 if all the integers are negative.
// For example, given the sequence -2, 11, -4, 13, -5, -2, the maximum subsequence sum is 20: a2 through a4

//Max Subsequence Sum  using O(N) - Dynamic Programming, O(N^2), O(N^3) and O(N log N) time Divide et Impera approach.

//My Array Iterator
class MyIterator {

      public $buckets = array();

      public function __construct($arr, $startIndex, $endIndex) {

             if(is_array($arr)) {

                $this->buckets = $arr;
             }

             $this->start = $startIndex;

             $this->end = $endIndex;

             $this->index = $this->start;
      }

      function fetch() {

             if($this->index <= $this->end) {

                return $this->buckets[$this->index++];

             }  else {

                return false; 
             }
      }
}

//File Iterator Class
class FileIterator {

      //the filename
      public $filename = NULL;

      //declare a handler for file which is currently NIL
      public $handler = NULL;

      //constructor of class
      public function __construct( $filename ) {

             $this->filename = $filename; 
      }

      public function fetch() {

             if(!isset($this->handler)) {

                 //prepare the file to read
                 $this->handler = fopen($this->filename,'r');
             }

             if( ($line = fgets($this->handler, 4096)) != false) {

                 return $line;

             } else {

                fclose($this->handler);

                $this->handler = NULL;

             }
      }
}

$file = new FileIterator('seq.in');

$inputs = array();

while(($line = $file->fetch()) != false) {

       $inputs[] = $line;
} 

//Input 1 read from an array
$arr = array(-2,11,-4,13,-5,-2);

//Input 2 read from File
//convert an array of string into an array of integers and firstly trim the string
$arr2 = array_map('intVal', explode(" ", trim($inputs[1])));

echo"<pre>";
print_r($arr2);
echo"</pre>";

//solution 1
//this algorithm solves the problem with Time Complexity O(N^2)

function getSubseqMaxSum( $arr ) {

         //firstly we determine the number of the elements
         $N = count($arr) - 1;

         $sumMax = -999;

         $iMax = -1; $jMax = -1;  

         //for i = 0 to N execute
         for($i = 0; $i <= $N; $i++) {

             $sum = 0;

             for($j = $i;$j <= $N; $j++) {

                 $sum = $sum + $arr[ $j ];  

                 if($sum > $sumMax) {

                    $sumMax = $sum;
                    $iMax = $i;
                    $jMax = $j;
                 }

             }

         } 

     return array("sumMax"=>$sumMax, 
                  "i"=>$iMax,
                  "j"=>$jMax);
}

/*
echo"<pre>";
print_r( getSubseqMaxSum( $arr2 ) );
echo"</pre>";


$result = getSubseqMaxSum($arr);

$start = $result["i"];

$end = $result["j"];

$it = new MyIterator($arr, $start, $end);

echo"Subseq is => ";
while(($curr = $it->fetch()) != false) {

       echo$curr." ";
}
*/

//solution 2
//this algorithm is more efficient because solves the problem with time complexity O(N) linear 
//using Dynamic Programming
//It uses the following recursion: best(i) = max(a[i], best[i-1] + a[i]);

function getMaxSumSubseq( $arr ) {

         $sumMax = -9999;

         $N = count( $arr ) - 1;

         $best = array();

         $best[ 0 ] = $arr[ 0 ];

         $sumMax = 0;

         $posMax = -1;
        
         for($i = 1; $i <= $N; $i++) {

              $best[$i] = $arr[$i];
              
              if($best[ $i - 1 ] + $arr[ $i ] > $arr[ $i ]) {

                 $best[ $i ] = $best[ $i - 1 ] + $arr[ $i ]; 
              }  

              if( $best[ $i ] > $sumMax ) {

                 $sumMax = $best[ $i ]; 
 
                 $posMax = $i;
              }
         }

     //display the max sum subsequence 
     $s = 0;

     $start = -1;

     for($i = $posMax; $i >= 0; $i--) {

         $s += $arr[$i];

         if($s == $sumMax) {

            $start = $i;

            break;
         }
     }

     //put them into object Iterator and then find out the subsequence
     $it = new MyIterator($arr, $start, $posMax);

     $subsequence = array();

     while(($curr = $it->fetch()) != false) {

            array_push($subsequence, $curr);
     }


     //output
     return array("sumMax"      => $sumMax,
                  "SubSequence" => $subsequence);

}//end function

//print_r( getMaxSumSubseq( $arr2 ) );

//solution 3
//----------
//this algorithm solves the problem using Divide et Impera and time complexity N log N and it's more efficient.
//using bestMax = max(bestL, max(bestR, maxSuf + maxPref))
//------------------------
//array(-2,11,-4,13,-5,-2);
//------------------------

function getMaxSumSubSequence($arr, $li, $ls) {

         if($li == $ls) return $arr[ $li ];

         $middle = intval(($li+$ls)/2);


         $bestL = getMaxSumSubSequence($arr, $li, $middle);
         $bestR = getMaxSumSubSequence($arr, $middle+1,$ls);

         $maxSuf = -9999;         
         $maxPre = -9999;

         $suf = 0;
         for($i = $middle;$i >= $li; $i--) {

             $suf += $arr[$i];  

             if($suf > $maxSuf) {
                $maxSuf = $suf;
             }         
         }    

         $pre = 0;
         for($j = $middle+1;$j <= $ls; $j++) {

             $pre += $arr[$j];

             if($pre > $maxPre) {
                $maxPre = $pre;
             }
         }    


    return max($bestL, max($bestR, ($maxSuf + $maxPre) ));            
}

//echo getMaxSumSubSequence($arr, 0, 5);

//The following algorithm solves the problem with time complexity O(N^3) 
//and it's not so efficient because it computes partial sums many times.

//@String $arr input Array
//@return Integer $bestSum - the maximum subsequence sum
function getSubseqSum( $arr ) {

         $N = count($arr) - 1;

         $bestSum = 0;

         $posBest = -1;

         for($i = 0; $i <= $N; $i++) {

             for($j = $N; $j >= $i; $j--) {

                 $partialSum = 0;

                 for($k = $i; $k <= $j; $k++) {

                     $partialSum += $arr[ $k ];  
                 }

                 if($partialSum > $bestSum) {

                    $bestSum = $partialSum;
                 }                   
             } 
         }

   return $bestSum;
}

//This algorithm solve the problem with linear O(N) time complexity using Dynamic Programming
// best[i] = sum[i] - min(sum[j-1])

function getSumSeq( $arr ) {

         $N = count($arr) - 1;
 
         $sum = array();

         $sum[ 0 ] = $arr[ 0 ];

         for($i = 1; $i <= $N; $i++) {

             $sum[ $i ] = $arr[ $i ] + $sum[ $i - 1 ]; 
         }  

         $bestSum = 0;

         $best = array();

         $best[ 0 ] = $sum[ 0 ];

         $min = $sum[ 0 ];
 
         for($i = 1; $i <= $N; $i++) {

             $best[ $i ] = $sum[ $i ] - $min;

             if($sum[ $i ] < $min) {

                $min = $sum[ $i ];
             } 

             if($bestSum < $best[ $i ]) {

                $bestSum  = $best[ $i ]; 
                $pos = $i;
             }
         } 

     return array("bestsum"=>$bestSum, 
                  "pos"=>$pos);
}

print_r( getSumSeq( $arr2 ) );

?>