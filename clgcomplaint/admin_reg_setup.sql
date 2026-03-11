-- Admin Registration Database
CREATE DATABASE IF NOT EXISTS admin_reg_db;
USE admin_reg_db;

-- Admin Users Table
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(15),
    role ENUM('super_admin', 'admin', 'moderator') DEFAULT 'admin',
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- Default Super Admin
INSERT INTO admins (username, password, full_name, role) VALUES 
('admin', MD5('admin123'), 'Super Administrator', 'super_admin');
