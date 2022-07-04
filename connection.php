<?php

$databaseHost = 'localhost';
$databaseName = 'todo';
$databaseUsername = 'root';
$databasePassword = '';

$con = $mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if ($con->connect_errno){
    die("ha ocurrido un error");
}
?>