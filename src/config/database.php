<?php
$host = $_ENV['DB_HOST'] ?? 'db';
$dbname = $_ENV['DB_NAME'] ?? 'bio_app';
$username = $_ENV['DB_USER'] ?? 'app_user';
$password = $_ENV['DB_PASSWORD'] ?? 'secure_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
