<?php include_once 'DBConnect.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// echo "Testing API";

// phpinfo();

$objectDB = new DBConnect();
$connection = $objectDB->connect();

var_dump($connection);