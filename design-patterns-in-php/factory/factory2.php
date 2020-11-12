<?php

        interface IDocument {

              function outputHeader();
              function outputBody($text);
              function outputFooter($name);
        }


        class CasualDocument {


               function outputHeader() {
                    
                   $header = "<h3>What`s up man...</h3>";
 
                   $header .= '<p>You are really cool!</p>';


                       return $header;
               }

               function outputBody($text) {

                   return "<p>".$text."</p>";

               }

               function outputFooter($name) {

                   $footer = "<p>Cheers: <b>".$name."</b>!</p>";

                   return $footer;
               }  


        }

        class FormalDocument implements IDocument {

               function outputHeader() {
                    
                   $header = "<h3>Bonjour, monsieur</h3>";

                   $header .= "<p>".date('F ,d Y')."</p>"; 
 
                   $header .= '<p>Comment allez vous?!Ca va Bien?!</p>';


                       return $header;
               }

               function outputBody($text) {

                   $body = str_replace(':-)','',$text);

                   return "<p>".$body."</p>";

               }

               function outputFooter($name) {

                   $footer = "<p>Au Revoir: <b>".$name."</b>! (a bientot)</p>";

                   return $footer;
               }  
               
        }

        class UserFactory {

            private static $instance = NULL;

                  private function UserFactory() {

                  }

                  public static function getInstance() {

                         if(self::$instance == NULL) {
          
                               return self::$instance = new UserFactory();
                         }

                      return self::$instance;

                  }

                  public function create($type) {

                       switch($type){

                           case 'casual' : $doctype = new CasualDocument();break;

                           case 'formal' : $doctype = new FormalDocument();break;

                           default: {};
                       
                       }

                   return $doctype;

                  } 

        }//end clas

        $doctype = UserFactory::getInstance()->create("formal");
        echo$doctype->outputHeader();
        echo$doctype->outputBody("I like this game I like framework mootools :-)");
        echo$doctype->outputFooter("Rasmus");

        echo"<hr/>";

        $doctype = UserFactory::getInstance()->create("casual");
        echo$doctype->outputHeader();
        echo$doctype->outputBody("I like this game I like framework mootools :-)");
        echo$doctype->outputFooter("Rasmus");


?>