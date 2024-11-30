<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $vaccine_id = $_POST['vaccine_id'];
    $appointment_date = $_POST['appointment_date'];

    try {
        $pdo->beginTransaction();

        // Insert a new appointment
        $insertAppointment = $pdo->prepare('
            INSERT INTO Appointments (user_id, vaccine_id, appointment_date) 
            VALUES (?, ?, ?)
        ');
        $insertAppointment->execute([$user_id, $vaccine_id, $appointment_date]);

        // Update stock levels
        $updateStock = $pdo->prepare('
            UPDATE Stock_Levels 
            SET quantity = quantity - 1 
            WHERE vaccine_id = ?
        ');
        $updateStock->execute([$vaccine_id]);

        // Log the action
        $logAction = $pdo->prepare('
            INSERT INTO Logs (user_id, action) 
            VALUES (?, ?)
        ');
        $logAction->execute([$user_id, 'Scheduled appointment for vaccine ID ' . $vaccine_id]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }

    header('Location: dashboard.php');
    exit;
}
?>
