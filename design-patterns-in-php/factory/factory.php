<?php


     interface IDocument {
        function outputHeader();
        function outputBody($body);
        function outputFooter($name); 
     }

     class CasualDocument implements IDocument {

         public function outputHeader() {

             $header = "Hello buddy!...What`s up man...";

            return $header;
         }


         public function outputBody($body) {

               $body = "<p>".$body."</p>";
                  
              return $body;
         }


         public function outputFooter($name) {

             $footer = 'A bientot buddy '.$name;

             return $footer;
         }
         

     }//end class





     class FormalDocument implements IDocument {

         public function outputHeader() {

             $header = "<p>".date("F d, y")."</p>";

             $header .= "<p>Bonjour monsieur</p>";

            return $header;
         }


         public function outputBody($body) {

               $body = str_replace(":-)","",$body);

               $body = "<p>".$body."</p>";
                  
              return $body;
         }


         public function outputFooter($name) {

             $footer = 'Sincerely '.$name;

             return $footer;
         }
     
       
     }//end clas


     class DocumentMaker{

              public static function create($type) {
 
                       switch($type) {

                                      case 'casual': $doctype = new CasualDocument();break;
 
                                      case 'formal': $doctype = new FormalDocument();break;
 
                                      default: {}
                                    } 

                   return $doctype;
               }

      }//end class

    echo"<h2>Output: </h2>";
   
    echo"<b>Document Formal: </b><br/>";

        $doctype = DocumentMaker::create("formal");

    echo$doctype->outputHeader(); 
    echo$doctype->outputBody("Thank you for lunch today. I appreciate it. :-)");
    echo$doctype->outputFooter("Rasmus");    
 
    echo"<hr/>";

    echo"<b>Document Casual: </b><br/><br/>";

        $doctype2 = DocumentMaker::create("casual");

    echo$doctype2->outputHeader(); 
    echo$doctype2->outputBody("Thank you for lunch today. I appreciate it. :-)");
    echo$doctype2->outputFooter("Rasmus");    


   echo"<hr/>";

   $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

   echo$output;
?>
