
-- Add this file into phpMyAdmin
-- Create the database
CREATE DATABASE IF NOT EXISTS phoneshop;

-- Head into the database
USE phoneshop;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
