-- Add this file into phpMyAdmin
-- Create the database
CREATE DATABASE IF NOT EXISTS phoneshop;

-- Head into the database
USE phoneshop;

CREATE TABLE ratings(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128) not NULL,
    name VARCHAR(128) not NULL,
    comment text,
    rating INT not NULL,
    subission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

