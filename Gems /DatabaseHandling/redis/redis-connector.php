<?php

   //Connecting to Redis server on localhost    
   $redis = new Redis(); 
   
   $redis->connect('127.0.0.1', 6379); 
   
   echo "Connection to server sucessfully<br/>"; 
   
   //set the data in redis string 
   $redis->set("username", "May Ann Campanera"); 
   
   // Get the stored data and print it 
   echo "Stored string in redis:: " .$redis->get("username");

?>
