<?php
// For local development only. Use environment variables on a shared server.
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$dbname = getenv('DB_NAME') ?: 'resume_lab';
// Server-only overrides (not in Git): copy db.local.example.php to db.local.php
if (is_file(__DIR__ . '/db.local.php')) require __DIR__ . '/db.local.php';
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { error_log(mysqli_connect_error()); http_response_code(500); exit('Database unavailable'); }
mysqli_set_charset($conn, 'utf8mb4');
