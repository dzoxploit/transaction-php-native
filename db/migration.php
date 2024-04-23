<?php
// File: migration.php

// Load database configuration
require_once('api/config/config.php');

// Connect to the database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL statement to create transactions table
$sql = "CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id VARCHAR(255) NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_type ENUM('virtual_account', 'credit_card') NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    merchant_id INT NOT NULL,
    references_id VARCHAR(255) NOT NULL,
    number_va VARCHAR(255),
    status ENUM('Pending', 'Paid', 'Failed', 'Expired') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute SQL statement
if ($mysqli->query($sql) === TRUE) {
    echo "Table 'transactions' created successfully\n";
} else {
    echo "Error creating table: " . $mysqli->error . "\n";
}

// Close connection
$mysqli->close();
?>
