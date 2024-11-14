CREATE DATABASE topup_db;

USE topup_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    ml_user_id VARCHAR(20) NOT NULL,
    diamonds INT NOT NULL,
    total_price DECIMAL(10, 2),
    status ENUM('pending', 'paid', 'completed', 'rejected') DEFAULT 'pending',
    payment_proof VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);