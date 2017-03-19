<?php

$host = 'localhost';
$dbUser = 'php';
$dbPassword = 'php';
$database = 'hack24';

// creates a mysql connection
$db = new mysqli($host, $dbUser, $dbPassword, $database);

// if the db connection fails kill the script
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}