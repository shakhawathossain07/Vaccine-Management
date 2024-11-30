<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $vaccine_id = $_POST['vaccine_id'];
    $appointment_date = $_POST['appointment_date'];

    // Update appointment details
    $stmt = $pdo->prepare('
        UPDATE Appointments 
        SET vaccine_id = ?, appointment_date = ? 
        WHERE appointment_id = ?
    ');
    $stmt->execute([$vaccine_id, $appointment_date, $appointment_id]);

    header('Location: dashboard.php');
    exit;
}
?>
