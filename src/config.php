<?php
declare(strict_types=1);

$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('POSTGRES_DB') ?: 'petsdb';
$user = getenv('POSTGRES_USER') ?: 'petuser';
$pass = getenv('POSTGRES_PASSWORD') ?: 'petpass';
$dsn  = "pgsql:host={$host};dbname={$db};";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Banco indisponível: " . $e->getMessage());
}
