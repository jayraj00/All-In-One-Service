<?php 

ob_start(); // Turn on output buffring
session_start();

date_default_timezone_set('Asia/Kolkata');

try {
    $cn = new PDO("mysql:dbname=service;host=localhost", "root", "");
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>