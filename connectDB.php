<?php
$dbhost =
    $_SERVER[
        'awseb-e-jveqnssyw3-stack-awsebrdsdatabase-qabgiymquueh.chttsa0blrl0.us-east-1.rds.amazonaws.com'
    ];
$dbport = $_SERVER['3306'];
$dbname = $_SERVER['awseb-e-jveqnssyw3-stack-awsebrdsdatabase-qabgiymquueh'];
$charset = 'utf8';

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
$username = $_SERVER['roomx'];
$password = $_SERVER['roomX123'];

$pdo = new PDO($dsn, $username, $password);
?>
