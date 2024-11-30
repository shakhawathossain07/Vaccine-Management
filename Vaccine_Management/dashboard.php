<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

// Database connection
require 'db.php';

// Fetch vaccines
$vaccines = $pdo->query('SELECT * FROM Vaccines')->fetchAll(PDO::FETCH_ASSOC);

// Fetch vaccine batches
$batches = $pdo->query('SELECT * FROM Vaccine_Batches')->fetchAll(PDO::FETCH_ASSOC);

// Fetch appointments
if ($_SESSION['role'] === 1) { // Assuming 1 is for admin role
    $appointments = $pdo->query('SELECT * FROM Appointments')->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->prepare('SELECT * FROM Appointments WHERE user_id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Include the HTML part
include 'dashboard.html';
?>
