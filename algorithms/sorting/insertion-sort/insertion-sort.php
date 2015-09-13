
<link  href="//fonts.googleapis.com/css?family=Molengo:regular" rel="stylesheet" type="text/css" >
<style>
body {
  font-family: 'Molengo', serif;
  font-size: 25px;
  font-style: normal;
  font-weight: 400;
  text-shadow: none;
  text-decoration: none;
  text-transform: none;
  letter-spacing: 0em;
  word-spacing: 0em;
  line-height: 1em;
}
</style>
<h2>1 Introduction</h2>
<h2>1.1 Algorithms</h2>
<p>Informally, an <strong>algorithm</strong> is any well-defined computational procedure that takes some value, or set of values, as <strong>input</strong> and produces some value, or set of values, as <strong>output</strong>. An algorithm is thus a sequence of computational steps that transform the input into the output.</p>
<p>You can also view an algorithm as a tool for solving a well-specified <strong>computational problem.</strong>The statement of the problem specifies in general terms the desired input/output relationship. The algorithm describes a specific computational procedure for achieving that input/output relationship.</p>
<p>We begin our study of algorithms with the problem of sorting  a sequence of numbers into nondecreasing order. This problem arises frequently in practice and provides fertile ground for introducing many standard design techniques and analysis tools. Here is how we formally define the <strong>sorting problem:</strong></p>
<p><strong>Input:</strong> A sequence of n numbers (a1, a2,..., an)</p>
<p><strong>Output:</strong> A permutation (reordering) (a1', a2', a3',..., an') of the input sequence <br/>such that a1' <= a2'<= a3'<= ... <= an'</p>
<p>For example, given the input sequence (9,8,7,6,5,4,3,2,1), a sorting algorithm returns as output the sequence (1,2,3,4,5,6,7,8,9). Such an input sequence is called an instance of the sorting problem. In general, an instance of a problem consists of the input (satisfying whatever constraints are imposed in the problem statement) needed to compute a solution to the problem.</p>
<p>Sorting is a fundamental operation in computer science (many programs use it as an intermediate step), and as a result a large number of good sorting algorithms have been developed. Which algorithm is best for a given application depends on the number of items to be sorted, the extend to which the items are already somewhat sorted, and the kind of storage device to be used: main memory, disks, or tapes.</p>
<p>An algorithm is said to be correct if, for every input instance, it halts with the correct output. We say a correct algorithm solves the given computational problem. An incorrect algorithm might not halt at all on some input instances, or it might halt with other than the desired answer. Contrary to what one might expect, incorrect algorithms can sometimes be useful, if their error rate can be controlled. An algorithm can be specified in English, as a computer program, or even as a hardware design. The only requirement is that the specification must provide a precise description of the computational procedure to be followed.</p>
<h2>1.2 Analyzing algorithms</h2>
<p><strong>Analyzing </strong>an algorithm has come to mean predicting the resources that the algorithm requires. Occasionally, resources such as memory, communication bandwidht, or logic gates are of primary concern, but most often it is computational time that we want to measure. Generally, by analyzing several candidate algorithms for a problem, a most efficient one can be easily identified. Such analysis may indicate more that one viable candidate, but several inferior algorithms are usually discarded in the process.</p>
<p>Analysis of <strong>Insertion sort</strong></p>
<p>The time taken by the INSERTION-SORT procedure depends on the input: sorting  a thousand numbers takes longer than sorting three numbers. More-ever, INSERRTION-SORT can take different amounts of time to sort two input sequences of the same size depending on how nearly sorted they already are. In general, the time taken by an algorithm grows with the size of the input, so it is traditional to describe the running time of a program as a function of the size of its input. To do so, we need to define the terms, "running time" and "size of input" more carefully.</p>
<p>The best notation for <strong>input size</strong> depends on the problem being studied. For many problems, such as sorting or computing discrete Fourier transforms, the most nature measure is the number of items in the input - for example - the array size n for sorting. For many other problems , such as multiplying two integers, the best measure of input size is the total number of bits needed to represent in input in ordinary binary notation. Sometimes, it more appropriate to describe the size of the input with two numbers rather than one. For instance, if the input to an algorithm is a graph, the input size can be described by the number of vertices and edges in the graph.</p>
<p><strong>The running time</strong> of an algorithm on particular input is the number of primitive operations or "steps" executed. It is convenient to define the notion of step so that it is as machine-independent as possible. For the moment let us adopt the following view. A constant amount of time is required to execute each line of our pseudocode. One line may take a different amount of time than another line, but we shall assume that each execution of the ith line takes time ci, where ci is a constant. This viewpoint is in keeping with the RAM model, and it also reflects how the pseudocode would be implemented on most actual computers.</p>
<p>In the following discussion , our expression for the running time of INSERTION-SORT will evolvefrom a messy formula that uses all the statement costs ci to a much simpler notation that is more concise and easily manipulated. This simpler notation will also make it easy to determine whether on algorithmis more efficient than another.</p>
<p>We start by presenting the INSERTION-SORT procedure with the time "cost" of each statement and the number of times each statement is executed. For each j=2,3,..,n, where n = length[A], we let tj be the number of times the <strong>while</strong> loop test in line 5 is executed for that value of j. We assume that comments are not executable statements and so they take no time.</p>
<pre><code>
INSERTION-SORT(A)                     cost    times 
1 for j <- 2 to length[A]             c1      n
2     do key <- A[j]                  c2      n-1
3     => insert A[j] into the 
      sorted sequence A[1..j-1] 
4     i <- j - 1                      c4      n-1 
5     while i > 0 and A[i] > key      c5      sum(j=2,n)tj
6           do A[i+1] = A[i]          c6      sum(j=2,n)(tj-1)
7           i <- i - 1                c7      sum(j=2,n)(tj-1)
8       A[i+1] <- key                 c8      n-1
</code></pre>
<p>The running time of the algorithm is the sum of running times for each statement executed; a statement that takes c(i) steps to execute and is executed n times will contribute c(i)n  to the total running time. To compute T(n) , the running time of INSERTION-SORT, we sum the products of the cost and times columns, obtaining:</p>
<p>T(n) = c1n + c2(n-1) + c4(n-1) + c5E(j=2,n)t(j) + c6E(j=2,n)t(j) + c7E(j=2,n)t(j) + c8(n-1)</p>
<p>Even for inputs for a given size , an algorithm's running time may depend on which input of that size is given. For example, in INSERTION-SORT, the best case occurs if the array is already sorted. For each j=2,3,...,n we then find A[j] <= key in line 5  when i has its initial value of j - 1. Thus t(j) = 1 for j=2, 3, 4,..., n. and the best case running time is:</p>
<p>T(n) = c1n + c2(n-1) + c4(n-1) + c5(n-1) + c8(n-1) = (c1+c2+C4+c5+c8)n - (c2+c4+c5+c8)</p>
<p>This running time can be expressed as an+b for constants a and b that depend on the statement cost ci; it is thus  a linear function of n.</p>
<p>If the array is in reverse sorted order - that is, in decreasing order - the worst case results. We must compare each element A[j] with each element in the entire sorted subarray A[1...j-1], and so tj  = j for j = 2,3,...,n</p>
<p>Noting that:</p>
<pre><code>
 n 
 E (j) = n(n+1)/2 - 1;
j=2
</code></pre>
<p>we find that in the worst case, the running time of INSERTION-SORT is:</p>
<p>T(n) = c1n + c2(n-1) + c4(n-1) + c5(n(n-1)/2 - 1) + c6(n(n-1)/2 - 1) + c7(n(n-1)/2 - 1) + c8(n-1)</p>
<p> = (c5/2 + c6/2 + c7/2)n*n + (c1+c2+c4+c5/2-c6/2-c7/2+c8)*n - (c2+c4+c5+8)</p>
<p>This worst-case running time can be expressed as an^2+bn+c for constants a,b, and c that again depend on the statement costs ci; it is thus a <strong>quadratic function</strong> of n.</p>
<p>Typically, as  in insertion sort, the running time of an algorithm  is fixed  for a given input, although in later chapters we shall  see some interesting "randomized" algorithms whose behovior can vary even for  a fixed input.</p>
<?php

  class Sorting {

     private $vec = array();     
     private $n; 

        public function __construct($arr) {
               $this->vec = $arr;
               $this->n = count($this->vec);
        }

        public function insertionSort() {
               $n = $this->n;
               for($i=1;$i<$n;$i++) {
                   $temp = $this->vec[$i];
                   $j = $i - 1;
                   while($j>=0 && $this->vec[$j] > $temp) {
                         $this->vec[$j+1] = $this->vec[$j]; 
                         $j--;
                   } 
                   $this->vec[$j+1] = $temp;
                   echo$this; 
               } 
        }

        public function insertionSort2() {
               $n = $this->n;
               for($i=1;$i<$n;$i++) {
                   $temp = $this->vec[$i];
                   for($j=$i-1;$j>=0;$j--) {
                       if($this->vec[$j] > $temp) {
                         $this->vec[$j+1] = $this->vec[$j];
                       } else {
                         break;  
                       }
                   }
                   $this->vec[$j+1] = $temp;
                   echo$this;
               } 
        }

        public function insertionSortModified() {
               $n = $this->n;
               for($i=1;$i<$n;$i++) {
                   $temp = $this->vec[$i];  
                   $li = 0;
                   $ls = $i - 1;
                   while($li<=$ls) {
                      $m = intval(($li+$ls)/2); 
                      if($temp > $this->vec[$m]) {
                         $li = $m + 1;  
                      } else {
                         $ls = $m - 1;
                      }
                   }
                   for($j=$i-1;$j>=$li;$j--) {
                       $this->vec[$j+1] = $this->vec[$j]; 
                   }
                   $this->vec[$li] = $temp;
                   echo$this;
               }  
        } 

        public function __toString() {
               $out = ''; 
               $n = $this->n;
               for($i=0;$i<$n;$i++) {
                   $out .= $this->vec[$i]. ' '; 
               }             
           return '<br/><font color="green">'.$out.'</font>';
        }
  }

  $arr =  array(9,8,7,6,5,4,3,2,1,0,11,22,111,33,-1,-12);
  $s = new Sorting($arr);
  echo"Input vector: " . $s;     
  echo"<br/><strong>Apply Insertion Sort Modified</strong>";
  $oldtime = microtime(true);
  $s->insertionSortModified();
  echo"<br/><font color='red'>Time Spent: ".$newtime = microtime(true) - $oldtime. "</font>";
  echo"<br/>";
  echo"Output vector: " . $s;  

  echo$source = highlight_file($_SERVER['SCRIPT_FILENAME']) 
?>