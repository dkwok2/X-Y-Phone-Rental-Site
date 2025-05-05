-- File that contains all tables and dummy data

-- Add this file into phpMyAdmin
-- Create the database
CREATE DATABASE IF NOT EXISTS phoneshop;

-- Head into the database
USE phoneshop;

-- Create the product catalog table for index (add three more columns, sale_amount, type, in stock)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    image VARCHAR(100),
    price DECIMAL(10,2),
    stock INT DEFAULT 0,
    sale boolean
);

-- Dummy data included 
INSERT INTO products (name, description, image, price, stock, sale) VALUES
('Samsung Galaxy A15', 'Affordable smartphone with 6.5-inch display and 50MP camera.', 'images/product_images/GalaxyA15.png', 199.99, 20, FALSE),
('Samsung Galaxy A16', 'Latest A-series phone with long battery life and sleek design.', 'images/product_images/GalaxyA16.png', 219.99, 30, TRUE),
('Samsung Galaxy A25', 'Mid-range phone with AMOLED screen and fast performance.', 'images/product_images/GalaxyA25.png', 289.99, 15, FALSE),
('Samsung Flip', 'Foldable smartphone with innovative display and compact build.', 'images/product_images/GalaxyFlip.png', 999.99, 10, TRUE),
('Samsung Galaxy S25', 'Flagship phone with cutting-edge camera and performance.', 'images/product_images/GalaxyS25.png', 1199.99, 25, TRUE),
('iPhone 15', 'Apple’s latest model with A16 Bionic chip and advanced camera.', 'images/product_images/iPhone15.png', 1099.00, 30, TRUE),
('iPhone 16', 'Upcoming Apple model with improved battery and AI features.', 'images/product_images/iPhone16.png', 1299.00, 25, FALSE),
('Nokia C200', 'Reliable entry-level phone with durable build and long battery.', 'images/product_images/NokiaC200.png', 129.99, 50, FALSE),
('Nokia G100', 'Compact budget phone with essential smartphone features.', 'images/product_images/NokiaG100.png', 99.99, 60, FALSE);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ratings(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(128) not NULL,
    name VARCHAR(128) not NULL,
    comment text,
    rating INT not NULL,
    subission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
