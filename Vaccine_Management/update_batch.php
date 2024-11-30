<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $batch_number = $_POST['batch_number'];
    $vaccine_id = $_POST['vaccine_id'];
    $expiration_date = $_POST['expiration_date'];

    // Update batch details
    $stmt = $pdo->prepare('
        UPDATE Vaccine_Batches 
        SET batch_number = ?, vaccine_id = ?, expiration_date = ? 
        WHERE batch_id = ?
    ');
    $stmt->execute([$batch_number, $vaccine_id, $expiration_date, $batch_id]);

    header('Location: dashboard.php');
    exit;
}
?>
