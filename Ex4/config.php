<?php
$host = "localhost";
$user = "root";
$password = ""; // add the connection's password if exists
$dbname = "my_database";
$charset = 'utf8mb4';

$dsn="mysql:host=$host;dbname=$dbname;charset=$charset";

try{
    $pdo = new PDO($dsn,$user,$password);
}catch(PDOException $e){
    echo "Connection failed.". $e->getMessage();
}
?>