<?php

    class Sort {

          private $arr = array();

          public function __construct($vec) {

              $this->arr = $vec;
          }

          public function getArr() {

            return $this->arr;
          } 

          public function bubbleSort() {

                 $n = count($this->arr);

                 do {

                 $sorted = false;

                 for($i=0;$i<$n-1;$i++) {

                      if($this->arr[$i] > $this->arr[$i+1]) {

                           $aux = $this->arr[$i];

                           $this->arr[$i] = $this->arr[$i+1];

                           $this->arr[$i+1] = $aux;

                           $sorted = true;
                      }
                 }

                 }while($sorted);
          }

          public function shuffle() {

                 $i = count($this->arr);

                 while($i) {

                     $j = rand(0,$i-1);

                     $x = $this->arr[--$i];

                     $this->arr[$i] = $this->arr[$j];

                     $this->arr[$j] = $x; 
                 }
          }

          public function reverse() {

                 $n = count($this->arr);

                 $vec = array();

                 for($i=0;$i<$n;$i++) {

                        $key = $n-$i-1; 

                        array_push($vec,$this->arr[$key]); 
                 }

             return $vec;
          }

    }//end class

    $arr = array(9,8,7,6,5,4,3,2,1);

    $ob = new Sort($arr);

    $v = $ob->getArr();
    echo"<h1>Input</h1>"; 
    echo"<pre>";
    print_r($v);
    echo"</pre>";


    $ob->bubbleSort();

    $v = $ob->getArr();
    echo"<h1>Sorted</h1>"; 
    echo"<pre>";
    print_r($v);
    echo"</pre>";


    $ob->shuffle();
    $v = $ob->getArr();
    echo"<h1>Shuffled</h1>"; 
    echo"<pre>";
    print_r($v);
    echo"</pre>";

    $r = $ob->reverse();
    echo"<h1>Reverse</h1>"; 
    echo"<pre>";
    print_r($r);
    echo"</pre>";

      $str = '[{"name": "adrian","description": "ddd","age": "20"},{"name": "asus","description": "ccc","age": "22"},{"name": "cezar","description": "bbb","age": "21"},{"name": "sorin","description": "aaa","age": "23"}]';
      $x = json_decode($str); 
      echo"<pre>";
      print_r($x);
      echo"</pre>";

   
echo$source = highlight_file($_SERVER['SCRIPT_FILENAME']); 
?>

<script type="text/javascript">

function array_reverse (array) {
    var arr_len = array.length, newkey = 0, tmp_arr = [];

    for(var key=0;key<arr_len;key++){  

        newkey = arr_len - key - 1;

        tmp_arr.push(array[newkey]);  
    }

  return tmp_arr;
}
var arr = [{name: 'adrian',description: 'ddd',age: 20},{name: 'asus',description: 'ccc',age: 22},{name: 'cezar',description: 'bbb',age: 21},{name: 'sorin',description: 'aaa',age: 23}];

console.log(arr);

var rra = array_reverse(arr);

console.log(rra);

</script>