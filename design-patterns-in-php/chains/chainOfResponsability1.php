<center><img src="chain.jpg"></center>
<h2>Chain Of Responsability</h2>
<?php


          abstract class URLHandler {

                abstract function getRealURL($url);
 
          }            

          class ImageURLHandler extends URLHandler{

               private $base;

               private $image_url;

                   public function ImageURLHandler($base,$image_url) {

                      $this->base = $base;

                      $this->image_url = $image_url;

                   }
                
                   public function getRealURL($url) {

                       if(preg_match("|^".$this->base."(.*?)$|",$url,$matches)) {
                            
                          return $this->image_url.$matches[1];
                       }

                       return null;
                   } 

          }//end class

          class BlogURLHandler extends URLHandler {

               private $base;
               private $blog_url;

 
                   public function BlogURLHandler($base,$blog_url) {
 

                      $this->base = $base;

                      $this->blog_url = $blog_url;

                   }

                   public function getRealURL($url) { 

                       if(preg_match("|^".$this->base."(.*?)/(.*?)/(.*?)$|",$url,$matches)) {
                            
                          return $this->blog_url.$matches[1].$matches[2].$matches[3];
                       }

                       return null;

                   } 
	
          }//end class


          class PageURLHandler extends URLHandler {

               private $base;
               private $page_url;

 
                   public function PageURLHandler($base,$page_url) {
 

                      $this->base = $base;

                      $this->page_url = $page_url;

                   }

                   public function getRealURL($url) { 

                       if(preg_match("|^".$this->base."(.*?)$|",$url,$matches)) {
                            
                          return $this->page_url.$matches[1];
                       }

                       return null;

                   } 
	
          }//end class

             


          class URLMapper {

               public $handles = array();

               private static $instance = NULL; 

                  private function URLMapper() {

                  }

                  public static function getInstance() {

                      if(self::$instance == NULL) {

                         self::$instance = new URLMapper();  
                      }  

                        return self::$instance;
                  }

                  public function addHandler($handle) {

                         $this->handles[] = $handle;
                  }
                 
                  public function mapURL($url) {

                        foreach($this->handles as $handle) {

                                $mapped = $handle->getRealURL($url);
                            
                              if(isset($mapped)) return $mapped;
                        }    

                        return $url; 
                  }

          }//end class
         
          $a = new ImageURLHandler("http://www.mysite.com/images/","http://www.mysite.com/image.php?img=");

          $b = new BlogURLHandler("http://www.mysite.com/blog/","http://www.mysite.com/blog.php?id=");

          $c = new PageURLHandler("http://www.mysite.com/page/","http://www.mysite.com/pages.php?offset=");

          URLMapper::getInstance()->addHandler($a);
          URLMapper::getInstance()->addHandler($b);
          URLMapper::getInstance()->addHandler($c);

                    echo"<pre>";
                    print_r(URLMapper::getInstance()->handles);
                    echo"</pre>";


          $urls = array("http://www.mysite.com/images/cat",

                        "http://www.mysite.com/images/dog",

                        "http://www.mysite.com/blog/12/02/08",

                        "http://www.mysite.com/images/hen",

                        "http://www.mysite.com/blog/02/27/09",

                        "http://www.mysite.com/page/1"
                       );

             foreach($urls as $input) {
                 
                 $output = URLMapper::getInstance()->mapURL($input);

                 echo$input."<br/>=><b>";
                 echo$output."</b><br/>\n";
             }


    echo"<hr/>";
 
    $output = highlight_file($_SERVER['SCRIPT_FILENAME']);

    echo$output;

?>