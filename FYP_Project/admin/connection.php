<?php

// Host Name
$dbhost = '';

// Database Name
$dbname = 'wisteria';

// Database Username
$dbuser = 'admin';

// Database Password
$dbpass = 'admin123';

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect)
{
    echo("Failed to connect database.");
}


?>
