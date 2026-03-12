-- Create Grievance Database
CREATE DATABASE IF NOT EXISTS grievance_db;
USE grievance_db;

-- Complaints Table
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
    status ENUM('pending','in_progress','resolved') DEFAULT 'pending',
    attachment VARCHAR(255) NULL,
    recording VARCHAR(255) NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Undertakings Table
CREATE TABLE IF NOT EXISTS undertakings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undertaking_id VARCHAR(20) UNIQUE,
    full_name VARCHAR(100),
    reg_no VARCHAR(20),
    department VARCHAR(50),
    academic_year VARCHAR(20),
    email VARCHAR(100),
    mobile VARCHAR(15),
    declaration1 TINYINT(1) DEFAULT 0,
    declaration2 TINYINT(1) DEFAULT 0,
    declaration3 TINYINT(1) DEFAULT 0,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);