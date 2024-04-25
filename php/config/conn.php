<?php
require_once 'props.php';

try {
    $db = new PDO("mysql:host={$host};dbname={$database}", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}