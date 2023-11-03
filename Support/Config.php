<?php

define("BASE_URL", "http://localhost/trabalhosPHP/ToDoList/");
define("TEMPLATE", "default");
define("TEMPLATE_ADMIN", "admin");

$hostName = 'localhost';
$dbName = 'todolist';
$user = 'root';
$pass = '';

try{
    $db = new PDO("mysql: host=$hostName; dbname=$dbName", $user, $pass);
}catch(PDOException $error){
    die("error ". $error->getMessage());
}