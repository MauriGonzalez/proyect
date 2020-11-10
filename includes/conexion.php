<?php  

$host = 'localhost';
$db = 'myndb';
$user = 'root';
$pass = '';

$pdo = new PDO ("mysql: host=$host;dbname=$db",$user,$pass);


//crear session
session_start();




?>