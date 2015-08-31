<?php

  $pattern = "/^[0-9]+$/";

      if(isset($_GET['card']) && $_GET['card'] !== '') {

           $number = trim($_GET['card']);   

           if(preg_match($pattern,$number)) {

               $flag = isValidNumber($number);
               
               if($flag) {$output = '<p class="valid">Valid credit card number</p>';} 

                      else 

                          {$output = '<p class="invalid">Invalid credit card number</p>';}

            } else {
                     $output = '<p class="error">Invalid input for function!</p>';
                   }
       }//endif

       function isValidNumber($number) {

                 $sum = 0;

                 $i = strlen($number) - 1;

                 $alt = 0;

                 $j = 0;

                 while($i>=0) {

                    //get digit
                    $num = $number[$i];

                    //if it`s not number then abort
                    if(!is_numeric($num)) {

                        return 0; 

                    }//endif

                    //if it's alternate bit then double digit
                    if(($j&1) ^ $alt) {

                       $num *= 2;

                       if($num>9) {

                           $num = ($num%10)+1; 

                       }//endif 

                    }//endif

                    //add to the rest of the sum
                    $sum += $num; 

                    //go to the next digit
                    $i--;

                    $j++;
                 }  

          return ($sum%10 == 0) ? 1 : 0;   

        }//end function

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>Credit card number validation</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
   <style type="text/css">
    html,body{font-family:"arial rounded mt bold","lucida grande",arial,sans-serif;background:#9828FF;}
    #doc2{background:#f8f8f8;border:1em solid #f8f8f8;-moz-border-radius:10px;}
    h1{font-size:200%;margin:10px 0;color: #5901A9}
    label{font-size: 40px}
    input{border: 1px solid #ccc;color: #000;font-size: 40px;padding: 10px;margin: 10px;text-align: center}
    input:focus{background: #DFC4FF}
    .valid{color: lightgreen;font-size: 20px}
    .invalid{color: red;font-size: 20px}
    .error{background: yellow;color: red;width: 250px;padding: 5px;font-size: 20px}
    #ft {margin:3em 0 1em 0;color:#ccc;}
    #ft a{color:#ccc;}
   </style>
</head>
<body>
<div id="doc2" class="yui-t7">
   <div id="hd" role="banner"><h1>Credit Card Number Validation</h1></div>
   <div id="bd" role="main">

	<div class="yui-g">
        <form action="luhn.php" method="get">
        <p><label for="card">identifier</label><input type="text" id="card" name="card" value="<?php if(isset($_GET['card'])) {echo$_GET['card'];}?>"/><input type="submit" name="solve" id="solve" value="luhn"></p>
        <p><div id="output"><?php if(isset($output)) {echo$output;}?></div></p>
        </form> 
	</div>

	</div>
   <div id="ft" role="contentinfo"><p>written by Adrian Statescu</p></div>
</div>
</body>
</html>
<?php
        $credit = '6761640015999567';      
        $credit2 = '2131000000000008';

?>