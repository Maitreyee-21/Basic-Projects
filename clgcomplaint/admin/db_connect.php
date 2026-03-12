<?php
// Connect to MySQL server (no specific database yet)
$admin_conn = mysqli_connect("localhost", "root", "");
if (!$admin_conn) {
    die(" MySQL Server Connection Failed: " . mysqli_connect_error());
}

// Create database if not exists
$db_create = mysqli_query($admin_conn, "CREATE DATABASE IF NOT EXISTS admin_reg_db");
if (!$db_create) {
    die(" Database creation failed: " . mysqli_error($admin_conn));
}

// Select the database
mysqli_select_db($admin_conn, "admin_reg_db");

// Create table if not exists
$table_create = mysqli_query($admin_conn, "
    CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Insert default admin if not exists
$default_admin = mysqli_query($admin_conn, "INSERT IGNORE INTO admins (username, password, full_name) VALUES ('admin', MD5('admin123'), 'Super Administrator')");

mysqli_set_charset($admin_conn, "utf8mb4");
?>
