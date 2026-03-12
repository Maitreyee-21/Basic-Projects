<?php
// Unified Database Configuration
$host = 'localhost';
$db_name = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>