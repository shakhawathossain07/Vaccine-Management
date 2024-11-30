<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];

    try {
        // Delete appointment
        $stmt = $pdo->prepare('DELETE FROM Appointments WHERE appointment_id = ?');
        $stmt->execute([$appointment_id]);

        header('Location: dashboard.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
