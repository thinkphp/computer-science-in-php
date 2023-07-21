<?php

ini_set('display_errors', 1);


$db = new SQLite3('test.db');

$version = $db->querySingle('SELECT SQLITE_VERSION()');

echo $version . "\n";

?>
