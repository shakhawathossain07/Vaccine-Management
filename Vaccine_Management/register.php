<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Default role_id for new users
    $role_id = 2; // Assuming 2 is the role_id for standard users

    // Insert the user into the database
    $stmt = $pdo->prepare('INSERT INTO Users (username, password, role_id) VALUES (?, ?, ?)');
    $stmt->execute([$username, $hashed_password, $role_id]);

    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['role'] = $role_id;

    header('Location: dashboard.php');
    exit;
}
?>
