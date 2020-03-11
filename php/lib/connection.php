<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "12itm27_news";

$connection = new mysqli($serverName, $username, $password, $dbName);

$connection->set_charset('utf8');
