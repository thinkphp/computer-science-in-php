<?php

echo "<pre>";

// Server & port details
$server = '127.0.0.1';
$port = 11211;

// Initiate a new object of memcache
$memcacheD = new Memcached();

// Add server
if ($memcacheD->addServer($server, $port)) {
	echo "** server added ** \n";
}
else {
	echo "** issue while creating a server **\n";
}

// Set key & value with TTL
$key = "GEEKSFORGEEKS";
$value = "computer science portal";
$ttl = 3600;
if ($memcacheD->add($key, $value, $ttl))
	echo "** added key-value (" . $key . ":"
	. $value . ")to cache successfully!! **\n";
else
	echo "** error while adding value to cache!! **\n";

// Get value of key
echo "**** FETCHED VALUE FOR KEY :"
			. $key . " ****\n";

$valD = $memcacheD->get($key);
var_dump($valD);

?>

