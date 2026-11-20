<?php
$host = "localhost";
$dbname = "mysql_store";
$username = "root";
$password = ""; // عدّليها لو MySQL عندك عليه باسورد

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die("Database connection failed. تأكدي إنك عملتي Import لملف mysql_store.sql وشغلتي MySQL.");
}
