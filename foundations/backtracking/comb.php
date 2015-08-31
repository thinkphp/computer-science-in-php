<?php
      class Backtracking {

            public $n;
            public $st = array();

            public function Backtracking($n) {
                   $this->n = $n;
                   $this->solve(); 
            } 

            public function init() {
                   $this->st[$this->k] = 0;
            }

            public function have_successor() {
                   if($this->st[$this->k]<$this->n) {
                      $this->st[$this->k]++;
                      return 1;  
                   }
               return 0;
            }

            public function is_valid() {
                  for($i=1;$i<$this->k;$i++) {
                      if($this->st[$i] == $this->st[$this->k]) {
                         return 0;
                      }
                  } 
                return 1; 
            }

            public function solution(){
                 return ($this->k == $this->n); 
            }

            public function display() {
                   for($i=1;$i<=$this->n;$i++) {
                       echo$this->st[$i]." ";
                   }
               echo"<br/>";
            }
    
            public function solve() {
                   $this->k = 1;
                   $this->init();

                   while($this->k > 0) {

                   do{}while(($HS=$this->have_successor()) && !$this->is_valid());  

                   if($HS) {
                     if($this->solution()) {
                       $this->display(); 
                     } else {
                       $this->k++;$this->init();
                     }
                   } else {
                     $this->k--;
                   }

                   }
            }
      } 

      class Comb extends Backtracking {
            public $p;

            public function __construct($n,$p) {
                   $this->p = $p;
                   parent::__construct($n);
            }

            public function init() {
                   if($this->k > 1) {
                      $this->st[$this->k] = $this->st[$this->k-1];
                   } else {
                      $this->st[$this->k] = 0; 
                   }
            } 

            public function have_successor() {
                   if($this->st[$this->k] < ($this->n-$this->p+$this->k)) {
                      $this->st[$this->k]++;
                      return 1;
                   } 
              return 0;
            }

            public function is_valid() {return 1;}

            public function solution() {
                   return ($this->k == $this->p);
            } 
      }

      $ob = new Comb(6,4);   
?>