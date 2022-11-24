<?php
error_reporting(-1);
ini_set('display_errors', 1);

$servername =
    'awseb-e-jveqnssyw3-stack-awsebrdsdatabase-qabgiymquueh.chttsa0blrl0.us-east-1.rds.amazonaws.com';
$username = 'roomx';
$password = 'roomX123';
$dbname = 'roomx';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

?>
