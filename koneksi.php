<?php
//Database connection(PDO: PHP DATABASE OBJEK )
$host = 'localhost'; // Atau bisa gunakan 127.0.0.1
$db = 'furdoor_adventure_db';
$user = 'root'; // Default user untuk Mysql lokal
$pass = ''; // Password Mysql jika ada
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}