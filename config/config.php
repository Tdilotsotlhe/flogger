<?php
ini_set('display_errors',1);error_reporting(E_ALL);

// $dsn      = 'mysql:dbname=qymtohfy_estore;host=localhost';
// $username = 'qymtohfy_client';
// $password = 'iGkODatKhcGK';

//possibly : http://34.94.233.100/
//$pass = "zq2P2TJJBTzhAc";

$dsn      = 'mysql:dbname=flogger_db;host=34.94.233.100';
// $dsn      = 'mysql:dbname=flogger_db;host=localhost';

$username = 'root';
$password = 'zq2P2TJJBTzhAc';

$dbh = new PDO($dsn, $username);



?>