<?php

$DB_DSN = 'mysql:host=127.0.0.1;dbname=mysql';
$DB_USER = 'ilya';
$DB_PASSWORD = 'pass123';

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successfully connected to the database - mysql";
    echo "<br>";
} catch (PDOException $e) {
    echo "Connected to the database - FAILED" . $e->getMessage();
    echo "<br>";
}

try {
    $sql = "CREATE DATABASE IF NOT EXISTS yclients";
    $db->exec($sql);
    echo "Successfully created database - yclients";
    echo "<br>";
    $sql = "USE yclients";
    $db->exec($sql);
}
catch (PDOException $e) {
    echo "Creating database yclients FAILED" . $e->getMessage();
    echo "<br>";
}

// иницализация таблицы Customer
try {
    $sql = "CREATE TABLE IF NOT EXISTS Customer (id INT NOT NULL AUTO_INCREMENT, name VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, age INT, phone BIGINT, deleted_flg INT, PRIMARY KEY (id))";
    $db->exec($sql);
    echo "Successfully created tables - Customer";
    echo "<br>";
}
catch (PDOException $e) {
    echo "Creating table Customer FAILED" . $e->getMessage();
    echo "<br>";
}

// иницализация таблицы Transaction
try {
    $sql = "CREATE TABLE IF NOT EXISTS Transaction (id INT NOT NULL AUTO_INCREMENT, customer_id INT, timestamp TEXT NOT NULL, PRIMARY KEY (id))";
    $db->exec($sql);
    echo "Successfully created tables - Transaction";
    echo "<br>";
}
catch (PDOException $e) {
    echo "Creating table Transaction FAILED" . $e->getMessage();
    echo "<br>";
}

// иницализация таблицы Transaction_details
try {
    $sql = "CREATE TABLE IF NOT EXISTS Transaction_details (id INT NOT NULL AUTO_INCREMENT, transaction_id INT, product_id INT, PRIMARY KEY (id))";
    $db->exec($sql);
    echo "Successfully created tables - Transaction_details";
    echo "<br>";
}
catch (PDOException $e) {
    echo "Creating table Transaction_details FAILED" . $e->getMessage();
    echo "<br>";
}

// иницализация таблицы Products
// прайс поправить на флоат
try {
    $sql = "CREATE TABLE IF NOT EXISTS Products (id INT NOT NULL AUTO_INCREMENT, title TEXT NOT NULL, description TEXT NOT NULL, price FLOAT, PRIMARY KEY (id))";
    $db->exec($sql);
    echo "Successfully created tables - Products";
    echo "<br>";
}
catch (PDOException $e) {
    echo "Creating table Products FAILED" . $e->getMessage();
    echo "<br>";
}

?>