CREATE DATABASE IF NOT EXISTS grievance_db;
USE grievance_db;

CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    complaint_id VARCHAR(20) UNIQUE,
    full_name VARCHAR(100),
    reg_no VARCHAR(20),
    department VARCHAR(50),
    email VARCHAR(100),
    category VARCHAR(50),
    incident_date DATE,
    description TEXT,
    status ENUM('pending', 'in_progress', 'resolved') DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
