<?php
$host = 'localhost';
$dbname = 'greenscape_db';
$username = 'root'; 
$password = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // FORCE UTC for both PHP and MySQL to prevent "expired" errors
    date_default_timezone_set('UTC');
    $pdo->exec("SET time_zone = '+00:00'");
    
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>